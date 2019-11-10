@forelse($sektors as $sektor)
	<option value="{{$sektor->id}}">{{$sektor->nama}}</option>
@empty
    <option value="">No Data Available</option>
@endforelse