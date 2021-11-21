@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}

your message is sent, the Id is : **{{$slug}}**  

Click [this link](http://localhost:8020/ticket/{{$slug}}) to view your message

TiS System
@endcomponent