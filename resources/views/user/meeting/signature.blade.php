{{-- เช็คการอมรม --}}
@extends('user/layout/userlayout')
@section('title')
    เซ็นชื่อ
@endsection
@section('script')

<style>
    .kbw-signature { width: 400px; height: 200px;}
    #sig canvas{
        width: 100% !important;
        height: auto;
    }
</style>
@endsection
@section('content')
@if (Session::has('warning'))
<script>
    toastr.options = {
        "progressBar": true,
        "closeButton": true,
    }
    toastr.warning("{{ Session::get('warning') }}", 'warning!', {
        timeOut: 3000
    });
</script>
@endif
    <div class="w-full  mx-auto pb-8">
        <div class="con">
            <p>ลายเซ็น</p>
        </div>
        <div class="con-show">
            <div class="flex justify-end">
                <div class="button">
                    <a class="btn btnmodify" style="--clr:#FF525B" href="{{ url('/Meeting') }}">ย้อนกลับ</a>
                </div>
            </div>
            <div class="max-w-full ">
                <form class="text-center" method="POST" action="{{url('/AddUserUpdate')}}">
                    @csrf
                    <input type="hidden" value="{{$id}}" name="id">
                    <div class="col-md-12">
                        <label  for="">ลายเซ็น:</label>
                        <br/>
                        <div id="sig" ></div>
                        <br/>
                        <a id="clear" class=" cursor-pointer"><i class="fa-solid fa-arrow-rotate-left fa-2xl mt-8   "></i> </a>
                        <textarea id="signature64" name="signature" style="display: none"></textarea>
                    </div>
                    <br/>
                    <div class="button">
                        <button style="--clr:#00935F;" type="submit" class="btn btnmodify">Save</button>
                    </div>
                    
                </form>
            </div> 
    </div>
@endsection
@section('endscript')
<script type="text/javascript">
      var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
      $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
@endsection