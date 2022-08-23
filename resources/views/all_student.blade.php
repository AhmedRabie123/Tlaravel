{{-- normal one to one relashinship --}}

{{-- @foreach ($all_student as $item)
    {{ $item->name }}<br>
    {{ $item->email }}<br>
    {{ $item->rphone->phone }}<br>
@endforeach --}}


{{-- reverse one to one relashinship --}}

{{-- @foreach ($all_student as $item)

    {{ $item->rstudent->name }}<br>
    {{ $item->rstudent->email }}<br>
    {{ $item->phone }}<br>

@endforeach --}}
  
 {{-- relashinship one to many --}}

{{-- @foreach ($all_student as $item)

   Name :  {{ $item->name }}<br>
   Email : {{ $item->email }}<br>
    
   @foreach ($item->rphone as $single)
     
   Phone :{{ $single->phone }}<br>
     
   @endforeach
   <br><br>
@endforeach --}}


