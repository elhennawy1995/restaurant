@extends('layouts.default.layout')
@section('content')
<h2 class="font-blue-ebonyclay"> Menu
</h2>
<h3 class="font-blue-ebonyclay"> Items
</h3>
<div class="table-scrollable table-scrollable-borderless">
    <table class="table table-hover table-light">
        <thead>
            <tr class="uppercase">
                <th> Item Name </th>
                <th> Price </th>
                <th> Category </th>
                <th> Meal Type </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> Fries </td>
                <td> $7 </td>
                <td> Side </td>
                <td> Lunch, Dinner </td>
                <td>
                    <a class="edit" href="javascript:;"> Edit </a>
                </td>
                <td>
                    <a class="delete" href="javascript:;"> Delet </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<h2 class="font-blue-ebonyclay"> Add Item</h2>
<form action="#" class="form-horizontal ">
<div class="form-body">	
    <h3 class="font-blue-ebonyclay"> Item name</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="item_name"> 
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Price</h3>
    <div class="form-group">
        <div class="col-md-4">
            <input type="text" class="form-control spinner" name="price"> 
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Description</h3>
    <div class="form-group">
        <div class="col-md-6">
            <textarea class="form-control spinner" name="description"> </textarea>
        </div>
    </div>    
    <h3 class="font-blue-ebonyclay">Sides</h3>
     <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" multiple>
                <option>Fries</option>
                <option>Rice</option>
            </select>
        </div>
    </div>
    <h3 class="font-blue-ebonyclay">Related Disposables</h3>
     <div class="form-group">
        <div class="col-md-4">
            <select class="bs-select form-control" multiple>
                <option>Fries</option>
                <option>Rice</option>
            </select>
        </div>
    </div>
    <h3 class="font-blue-ebonyclay"> Category</h3>
    <div class="form-group col-md-12">
        <div class="mt-checkbox-inline">
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="appetizer" /> Appetizers
                <span></span>
            </label>
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="main_course" /> Main course
                <span></span>
            </label>
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="sweet" /> Sweet
                <span></span>
            </label>
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="drink" /> Drink
                <span></span>
            </label>
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="side" /> Side
                <span></span>
            </label>
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="disposable" /> Disposables
                <span></span>
            </label>
        </div>
    </div>
	<h3 class="font-blue-ebonyclay"> Meal type</h3>
	<div class="form-group col-md-12">
		<div class="mt-checkbox-inline">
			<label class="mt-checkbox mt-checkbox-outline">
				<input type="checkbox" name="breakfast" /> Breakfast
				<span></span>
			</label>
			<label class="mt-checkbox mt-checkbox-outline">
				<input type="checkbox" name="lunch" /> Lunch
				<span></span>
			</label>
			<label class="mt-checkbox mt-checkbox-outline">
				<input type="checkbox" name="dinner" /> Dinner
				<span></span>
			</label>
		</div>
	</div>

    <h3 class="font-blue-ebonyclay"> Pictures</h3>
    <div class="row">
        <div class="col-md-12">
            <form id="fileupload" action="../assets/global/plugins/jquery-file-upload/server/php/" method="POST" enctype="multipart/form-data">
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn green fileinput-button">
                            <i class="fa fa-plus"></i>
                            <span> Add files... </span>
                            <input type="file" name="files[]" multiple=""> </span>
                        <button type="submit" class="btn blue start">
                            <i class="fa fa-upload"></i>
                            <span> Start upload </span>
                        </button>
                        <button type="reset" class="btn warning cancel">
                            <i class="fa fa-ban-circle"></i>
                            <span> Cancel upload </span>
                        </button>
                        <button type="button" class="btn red delete">
                            <i class="fa fa-trash"></i>
                            <span> Delete </span>
                        </button>
                        <!-- The global file processing state -->
                        <span class="fileupload-process"> </span>
                    </div>
                    <!-- The global progress information -->
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;"> </div>
                        </div>
                        <!-- The extended global progress information -->
                        <div class="progress-extended"> &nbsp; </div>
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped clearfix">
                    <tbody class="files"> </tbody>
                </table>
            </form>
        </div>
    </div>
    <!-- The blueimp Gallery widget -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
        <div class="slides"> </div>
        <h3 class="title"></h3>
        <a class="prev"> ‹ </a>
        <a class="next"> › </a>
        <a class="close white"> </a>
        <a class="play-pause"> </a>
        <ol class="indicator"> </ol>
    </div>
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <script id="template-upload" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger label label-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
            </td>
            <td> {% if (!i && !o.options.autoUpload) { %}
                <button class="btn blue start" disabled>
                    <i class="fa fa-upload"></i>
                    <span>Start</span>
                </button> {% } %} {% if (!i) { %}
                <button class="btn red cancel">
                    <i class="fa fa-ban"></i>
                    <span>Cancel</span>
                </button> {% } %} </td>
        </tr> {% } %} </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview"> {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>
                        <img src="{%=file.thumbnailUrl%}">
                    </a> {% } %} </span>
            </td>
            <td>
                <p class="name"> {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                    <span>{%=file.name%}</span> {% } %} </p> {% if (file.error) { %}
                <div>
                    <span class="label label-danger">Error</span> {%=file.error%}</div> {% } %} </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td> {% if (file.deleteUrl) { %}
                <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                    <i class="fa fa-trash-o"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                <button class="btn yellow cancel btn-sm">
                    <i class="fa fa-ban"></i>
                    <span>Cancel</span>
                </button> {% } %} </td>
        </tr> {% } %} </script>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn btn-circle green">Save</button>
        </div>
    </div>
</div>
</form>

@endsection