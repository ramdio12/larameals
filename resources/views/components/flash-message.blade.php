@if(session()->has('message'))
<div x-data="{show:true}" x-init="setTimeout(()=>show=false,4000)" x-show="show"  class="fixed top-20 left-1/2 transform -translate-x-1/2 bg-green-300 font-bold border border-green-800 text-green-700 rounded text-xl px-48 py-3">
{{-- <p>Recipe Created Successfully</p> --}}
<p>{{session('message')}}</p>
</div>
@endif
