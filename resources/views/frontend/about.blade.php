@extends('frontend.layout.app')

@section('content')
    <x-banner prefix="About" title="Us" />
<div class="about-area ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-left-content">
                        <div class="section-title">
                             <span class="text-uppercase">about us</span>
                            <h2>Welcome to</h2><h2><span>Our </span> <span class="primary-color">university</span></h2>
                        </div>
                        <p>
The University of Bamenda (UBa) is a distinctive anglo-saxon university with future international reputation for higher standards of achievements and innovations in all areas of professionalism, arts, sciences and technology. If you are looking for a life-changing experience that will equip you with the knowledge and skills you will need to meet the future with confidence, we are sure that you will find it in UBa. As a graduate or postgraduate student in UBa, you will study in modern surroundings that boast exceptionally well-equipped studios, workshops and facilities.
                        </p>
                        {{-- <a href="#" class="btn btn-primary btn-round">Read more</a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- img2 --}}
                    <img src="{{asset('frontend/images/img1.jpg')}}" alt="about us">
                </div>
            </div>
        </div>
    </div>

<div class="teacher-details pt--120 pb--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="tch-left-thumb">
                    {{-- img1 --}}
                    <img src="{{asset('frontend/images/img3.jpg')}}" alt="about us">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="teacher-contenttchd-content pl-5 pb-5">
                        <h3>Founding</h3>
                        <p class="mb-0">The University of BAMENDA was created by Decree n° 2010/371 of the 14th December 2010. The last of the eight state Universities in Cameroon as primary concern, to achieve the goals attributed to all the state Universities which include: </p>
                        <ul class="list mt-4 mb-4">
                            <li class="mb-2">Teaching</li>
                            <li class="mb-2">Research</li>
                            <li class="mb-2">Outreach</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Our mission</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Our values</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Our history</button>
  </li>
</ul>
<div class="tab-content my-5" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<p>The mission of UBa is to equip students with universal knowledge in the arts, sciences and technology. It strives to imbue in the students an overt spirit, reflective of critical and constructive thinking, spontaneous to initiatives and enterprise.</p>
<p>The university, to this end, brings the students to sanity as they imbibe, exchange and value ideas within a context of moral integrity and associative life. Its critical agenda is to pursue personal and collegial excellence in teaching, training, research and outreach in the spirit of the Anglo-Saxon tradition without sacrificing the advantages of cultural dialogue. </p>
<p>The learning experience which the university provides to students is the basis upon which students should demonstrate responsible leadership and subscribe to the core values of intellectual insurance responsive to the exigencies of the contemporary environment. </p>
<p>The university, conscious of the dynamic character of science and technology, will continue to strive for innovation in its quest to meet with the ramified demands of our contemporary times. </p>
</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<p>Inspired by different religions and leadership qualities of some leaders, students in UBa are guided by the following eight core values and principles of transformation: </p>
<ul>
    <li class="mb-2">Transformation for equity and fairness</li>
    <li class="mb-2">Respect for diversity and hierarchy</li>
    <li class="mb-2">People-centreness</li>
    <li class="mb-2">Student access</li>
    <li class="mb-2">Engagement</li>
    <li class="mb-2">Excellence</li>
    <li class="mb-2">Innovation</li>
    <li class="mb-2">Integrity</li>
</ul>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
<p>The history of The University of Bamenda is inextricably linked to that of the Cameroon College of Arts, Science and Technology (CCAST) and Ecole Normale Supérieure Annex (ENSAB) Bambili. The University of Bamenda germinated out of a local initiative hatched in 1962 following reforms in the Educational Policy of West Cameroon. The process was facilitated by the then Prime Minister and later Vice President of the Federal Republic of Cameroon Dr. John Ngu Foncha. Foncha’s vision rested on the standard of higher learning reflective of the Nigerian Colleges of Arts, Science and Technology (NCAST). This wish was even more urgent because by 1961, the number of university graduates was grossly inadequate to cope with the senior staff demands of the new nation state. There were slightly over twenty university graduates in the Southern Cameroons by 1962 and the top civil service jobs by dint of this limitation were dominated by expatriates, mostly Nigerians and British. </p>
<p> It was in dire need to allay this problem that the West Cameroon Government through its Education Policy Paper of July 1963 envisaged CCAST as a future college of the Federal University of Cameroon created in 1962. In the context of the imagination, it was to assume the status of an American Junior College or the English Polytechnic. This dream was somehow constrained by logistics and human resources. This perhaps explains why in 1963 when CCAST was transferred from its temporary site at GTTC Kumba to Bambili, USAID came in to lend support to firmly establish the institution, especially in the Science Department. This took place under the auspices of Dr. David Laird, USAID Adviser on Education, and Dr. William Stanley, Adviser on Science of Education. Mr. H. O. H. Vernon Jackson from the United States became the pioneer Principal. The USAID ground breaking mission was quite brief (1962 to 1963). Mr. Sylvester Dioh stands out prominent as one of the key Cameroonian figures in the early development of CCAST Bambili. In December 1963, CCAST was transferred to its present site in Bambili and Dioh appointed as Principal. </p>
  </div>
</div>
</div>
@endsection
