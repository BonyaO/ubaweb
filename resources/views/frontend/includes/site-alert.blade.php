@if($activeAlert ?? null)
<div class="modal uba-alert-modal" id="ubaSiteAlert" tabindex="-1" role="dialog" aria-labelledby="ubaSiteAlertTitle" aria-hidden="true" data-alert-id="{{$activeAlert->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content uba-alert-modal__content">
            <button type="button" class="uba-alert-modal__close" data-dismiss="modal" aria-label="Close">&times;</button>

            @if($activeAlert->imageUrl())
            <div class="uba-alert-modal__media">
                <img src="{{$activeAlert->imageUrl()}}" alt="">
            </div>
            @endif

            <div class="uba-alert-modal__body">
                <h3 id="ubaSiteAlertTitle">{{$activeAlert->title}}</h3>
                <div class="uba-alert-modal__description">
                    {!! $activeAlert->description !!}
                </div>

                @if($activeAlert->link_url)
                <a href="{{$activeAlert->link_url}}" target="_blank" rel="noopener" class="btn btn-primary btn-round">
                    {{$activeAlert->link_text ?: 'Learn more'}}
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        var modalEl = document.getElementById('ubaSiteAlert');
        if (!modalEl || typeof jQuery === 'undefined') {
            return;
        }

        var dismissKey = 'uba_alert_dismissed_' + modalEl.getAttribute('data-alert-id');

        if (window.localStorage && localStorage.getItem(dismissKey)) {
            return;
        }

        jQuery(modalEl).modal('show');

        jQuery(modalEl).on('hidden.bs.modal', function () {
            if (window.localStorage) {
                localStorage.setItem(dismissKey, '1');
            }
        });
    })();
</script>
@endif
