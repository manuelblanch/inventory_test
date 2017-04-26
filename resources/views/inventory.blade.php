
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Inventory
@endsection


@section('main-content')
    <!-- ========================================================================================================== -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <button type="submit" class="btn btn-primary " id="btnadd" name="btnadd"><i class="fa fa-plus"></i>Afegir objecte a l'inventari</button>
                <div class="box-body" style="max-width:900px;" >
                    <table id="table_cust" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr class="tableheader">
                            <th style="width:40px">#</th>
                            <th style="width:140px">Id Públic</th>
                            <th style="width:140px">Id extern</th>
                            <th style="width:140px">Tipus Id extern</th>
                            <th style="width:140px">Nom</th>
                            <th style="width:140px">Nom curt</th>
                            <th style="width:140px">Referència</th>
                            <th style="width:140px">Quantitat</th>
                            <th style="width:140px">Preu</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div id="modalcust" class="modal">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Form Master Customer</h4>
                        </div>
                        <!--modal header-->
                        <div class="modal-body">
                            <div class="pad" id="infopanel"></div>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Id Públic</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtname" placeholder="Name">
                                        <input type="hidden" id="crudmethod" value="N">
                                        <input type="hidden" id="txtid" value="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Id extern</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="cbogender" >
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tipus Id Extern</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="cbogender" >
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nom</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="cbogender" >
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nom Curt</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="cbogender" >
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Referència</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtcountry">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Quantitat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtphone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Preu</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="txtphone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary " id="btnsave"><i class="fa fa-save"></i> Save</button></div>
                                </div>
                            </div>
                            <!--modal footer-->
                        </div>
                        <!--modal-content-->
                    </div>
                    <!--modal-dialog modal-lg-->
                </div>
                <!--form-kantor-modal-->
            </div>
            </div>
    </section>

@endsection
