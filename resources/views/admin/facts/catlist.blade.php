@extends('admin.layout.master')
@section('css')
	 <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('admin-panel/assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-panel/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
          <a href="{{ route('admin.factscategory') }}">
            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                <i class="fa fa-plus"></i>
            </button>
        	</a>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-checkable table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                    <th> S N </th>
                    <th> Title </th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
            @if($data['rows'])
            	 @php $i = 1 @endphp
				@foreach($data['rows'] as $key => $row)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $row->title }}</td>
                    <td>  
                    	<div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a onclick="return confirm('Are you sure to Edit Fact Category?');" href="{{ route('admin.facts.deletecat',['id' => $row->id]) }}" >
                                    <i class="icon-docs"></i>Edit </a>
                            </li>
                            <li>
                                <a onclick="return confirm('Are you sure to Delete Fact Category?');" href="{{ route('admin.facts.deletecat',['id' => $row->id]) }}" >
                                    <i class="icon-tag"></i>Delete</a>
                            </li>
                        </ul>
	                    </div> 
	                </td>
                </tr>
                {{ $i ++}}
	            @endforeach
			@endif
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin-panel/assets/jsglobal/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-panel/assets/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-panel/assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
  	<!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('admin-panel/assets/pages/scripts/table-datatables-rowreorder.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection


