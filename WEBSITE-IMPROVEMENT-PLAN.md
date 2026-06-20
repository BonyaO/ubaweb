# UBa Website — Improvement Plan

Audit of the current Laravel/Filament codebase, compared against the standard feature set of public university websites (admissions, academics, research/library, faculty directories, news, campus life, search, multilingual support, accessibility). Findings are grouped by priority.

## How this was derived

Reviewed `app/Models`, `app/Filament/Resources`, `routes/web.php`, `app/Http/Controllers/PagesController.php`, and every view in `resources/views/frontend`, then compared the resulting feature map against what university sites typically ship (academic calendars, ETD/research repositories, faculty directories, vacancies/tenders, alumni, multilingual content, sitewide search, SEO basics).

---

## Phase 1 — Fix what's already built but disconnected (highest impact, lowest effort)

The admin panel manages several content types that either never reach the public site, or are faked with static markup. The data layer and CRUD already exist — this is pure wiring work.

| Finding | Evidence | Fix |
|---|---|---|
| **Testimonials are hardcoded** | `home.blade.php:211-231` has three copy-pasted French quotes (`"Vous devez profiter de la vie..."`) instead of looping over the `Testimonial` model, even though `TestimonialResource`, `TestimonialFactory`, and a seeder all exist and the table has 10 rows. | Replace the static blocks with `@foreach($testimonials as $testimonial)`; pass `Testimonial::latest()->take(6)->get()` from `PagesController::home()`. |
| **Service, Project, and Update models are admin-only** | Full Filament resources + factories + seeders exist for all three, but `grep` across `resources/views` finds zero references. No routes, no controller methods, no views. | Decide whether each is still wanted (see "Open questions" below); if yes, add routes/controller actions/views per the table in "Model & UI changes" further down. |
| **FAQ model is never rendered** | `FaqResource` + `Faq` model + seeder (10 rows) exist; no `/faq` route or view anywhere. | Add a simple `/faq` page (accordion), or embed an FAQ section into `about.blade.php` or the contact page. |
| **`/schools` index view is a stub with no route** | `resources/views/frontend/schools/index.blade.php` literally contains the text `"School home page"` and is never routed to — schools are only reachable one-by-one via the mega-menu dropdown. | Add `Route::get('/schools', 'schoolsIndex')`, build a real grid/listing view (logo, short description, link to `school->url()`). |
| **Unpublished content is publicly visible** | `Post` and `PressRelease` both have an `is_published` boolean, but `PagesController::home()`, `blog()`, and `pressRelease()` never filter on it — draft posts and unpublished press releases are visible to anyone. | Add `->where('is_published', true)` to the public queries for `Post` and `PressRelease`. This is a content-correctness bug, not a feature request — worth fixing regardless of what else is prioritized. |
| **Site-wide search box does nothing** | The slide-down search panel present on every page (`layout/app.blade.php:26-29`, `.offset-search`) posts to `action="#"`. | Point it at the blog search (`route('blog')` with a `search` query param, already wired up) as a first step; consider a proper global search later (see Phase 3). |
| **"Research" nav menu links to nothing** | `header.blade.php:24-29` — "Research profiles" and "UBa ETD" both link to `#`. | Either remove the menu entries until there's a real destination, or treat this as the trigger for the ETD/research repository feature in Phase 3. |

---

## Phase 2 — Structural/UX gaps

These need small model additions, not just view wiring.

- **No faculty/staff directory per department.** `TeamMember` has no `department_id`/`school_id` — it's used only for the homepage "core team" block. Most university sites let you browse lecturers/HODs per department. Needs a model change (see below) plus a "Faculty" tab on `departments/show.blade.php`.
- **Breadcrumbs are copy-pasted markup, not a component.** `departments/show.blade.php` and `programmes/show.blade.php` each hand-roll an identical `<nav aria-label="breadcrumb">` block. Extract to `<x-breadcrumb :items="[...]" />` (a components directory already exists at `resources/views/components/`) and reuse it on schools, posts, and events pages too.
- **No related-posts beyond category.** Now that category filtering exists on `/blog`, the natural next step is a "related posts" block on `blog-detail.blade.php` using shared tags, not just the random "Popular Posts" widget that's there today.
- **No academic calendar / key dates page.** Common on university sites (semester start/end, exam periods, registration deadlines). Could reuse the `Event` model with a `category` flag, or a new lightweight `AcademicEvent`/`CalendarEntry` model if the data shape differs meaningfully from `Event`.

---

## Phase 3 — Features most university sites have that UBa's doesn't have at all

Ranked roughly by how standard/expected they are for a public university:

1. **Research repository / ETD (Electronic Theses & Dissertations).** The nav already promises this ("UBa ETD") — it just doesn't exist. This is one of the most-used parts of a university site for postgraduate students and external researchers.
2. **Vacancies & tenders.** Standard for public institutions (academic/admin job postings, procurement notices). Currently nothing.
3. **Document/forms downloads center.** Handbooks, application forms, regulations as a browsable, categorized list — `PressRelease` already proves the file-upload pattern works, but there's no general-purpose downloads page.
4. **Alumni section.** Testimonials/success stories, alumni network info — currently absent.
5. **Newsletter subscription.** No `Subscriber` model or signup form; common for campus news distribution.
6. **French-language content.** Cameroon is officially bilingual and the codebase already calls `{{__('...')}}` in the header nav, but only `lang/en` exists — no `lang/fr`, and there's stray hardcoded French text sitting inside otherwise-English markup (the fake testimonials, ironically). Needs an actual i18n decision, not half-measures.
7. **Basic SEO/metadata.** No per-page `<title>`/meta-description, no Open Graph tags, no `sitemap.xml` (a `robots.txt` exists but nothing for it to reference). Cheap to add, meaningful for discoverability.
8. **Branded error pages.** No `resources/views/errors/404.blade.php` etc. — visitors hitting a bad link see Laravel's default error page instead of the site's theme.
9. **RSS feed for blog/news.** Trivial with the data that already exists; useful for press/partners who want to syndicate updates.

---

## Model & UI component changes

| Model | Change needed | Why |
|---|---|---|
| `Post` | None (schema is fine) — controller needs `where('is_published', true)` | Stop leaking drafts |
| `PressRelease` | None (schema is fine) — controller needs `where('is_published', true)` | Same bug as above |
| `TeamMember` | Add nullable `department_id` (FK to `departments`) and a `type` enum/string (`leadership` vs `faculty`) | Enables a faculty directory without a second model; keeps the existing homepage "core team" query working (`where('type', 'leadership')`) |
| `Faq` | None — already has `question`/`response`/`is_visible` | Just needs a route + view |
| `Service`, `Project`, `Update` | None required to *display* them — but confirm with stakeholders whether these are still wanted before building views (see Open Questions) | Avoid building UI for content types nobody intends to populate |
| New: `ResearchWork` (or similar) | `title`, `author_name`, `abstract`, `file`, `category` (thesis/article/dataset), `published_year`, `school_id`/`department_id` | Backs the ETD/research repository feature |
| New: `Vacancy` | `title`, `description`, `type` (job/tender), `deadline`, `file`, `is_published` | Backs vacancies & tenders |
| New: `Document` | `title`, `category`, `file`, `description` | Backs the general downloads center |
| New: `Subscriber` | `email`, `subscribed_at` | Backs newsletter signup |

| UI component | Change needed |
|---|---|
| `home.blade.php` testimonials block | Replace static HTML with `@foreach($testimonials as ...)` loop |
| `layout/app.blade.php` offset-search form | Wire `action`/`method` to `route('blog')`, or to a future global-search route |
| `header.blade.php` Research submenu | Replace dead `#` links once ETD/research pages exist (or hide the submenu until then) |
| New `resources/views/components/breadcrumb.blade.php` | Shared breadcrumb component to replace duplicated markup in department/programme show pages |
| New `resources/views/frontend/faq.blade.php` | Simple accordion view over `Faq::where('is_visible', true)` |
| New `resources/views/frontend/schools/index.blade.php` (replace stub) | Real grid of schools with logo/short description |
| New `resources/views/frontend/research/*` | ETD/research repository listing + detail pages |
| New `resources/views/frontend/vacancies/*` | Vacancies & tenders listing + detail pages |
| New `resources/views/errors/404.blade.php`, `500.blade.php` | Branded error pages using `frontend.layout.app` |

---

## Open questions before building Phase 1/3 items

- **Service/Project/Update**: are these still part of the content strategy, or leftover scaffolding from an earlier direction? Worth a five-minute conversation before investing in views for them.
- **ETD/research repository**: is this meant to host actual files (storage/bandwidth implications) or just metadata with links to an external repository (e.g., a partner library system)?
- **French localization**: full bilingual site, or just key pages (home, admissions, contact)? This materially changes scope.

## Suggested order of execution

1. Fix the `is_published` leak (5 minutes, real bug).
2. Wire `Testimonial` into the homepage (removes fake content).
3. Add the FAQ page and the real `/schools` index (data already exists, just needs routes + views).
4. Decide on Service/Project/Update, then build or remove.
5. Breadcrumb component extraction (cleanup, low risk).
6. Scope and build whichever Phase 3 features stakeholders prioritize (ETD is the most visibly "promised but missing" one since it's already in the nav).
