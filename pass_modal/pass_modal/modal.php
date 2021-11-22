<!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit User</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Firstname:</span>
						<input type="text" style="width:350px;" class="form-control" id="efirstname">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Lastname:</span>
						<input type="text" style="width:350px;" class="form-control" id="elastname">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Address:</span>
						<input type="text" style="width:350px;" class="form-control" id="eaddress">
					</div>					
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i> Update</button>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->