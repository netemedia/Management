@if ($errors->any())
  <div class="bg-red-100 border-2 border-red-400 text-red-700 px-4 py-3 my-4 rounded">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
