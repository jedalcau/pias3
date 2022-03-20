<?php
include "header.php";
?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">REPORTE ESPECIFICO DE ATENCIONES</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <form method="get" action="">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtfecinicio">Fecha inicial <span class="text-danger"> (Obligatorio)</span></label>
                                            <input type="date" name="txtfecinicio" id="txtfecinicio" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtfecfinal">Fecha Final</label>
                                            <input type="date" name="txtfecfinal" id="txtfecfinal" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-0">
                                    <div class="text-center compose-btn">
                                        <button type="button" class="btn btn-success" id="btnVer"><span>Ver reporte de atenciones</span> <i class="fa fa-send m-l-5"></i></button>
                                        <button type="button" class="btn btn-primary" id="btnImprimir"><span>Imprimir reporte de atenciones</span> <i class="fa fa-send m-l-5"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                <button type="button" class="btn btn-success" onclick="exportTableToExcel('tblData', 'pias-data')">Exportar la data a un Archivo en Excel</button>
                </div>
                <div id="respuesta">Resultado</div>
            </div>

    <script type="text/javascript">
        $(document).ready(function(){
            
            var fecinicio = document.getElementById('txtfecinicio');
            var fecfinal  = document.getElementById('txtfecfinal');
            
            $("#btnVer").click(function(event){
                event.preventDefault();
                
                $.ajax({
                    url : '../controller/listado.controller.php',
                    data : { txtfecinicio : fecinicio.value , txtfecfinal: fecfinal.value},
                    type : 'get',
                    success : function(res) {
                        $("#respuesta").html(res);
                    },
                    error : function(error) {
                        alert('Disculpe, existió un problema');
                    }
                });
            });

            $("#btnImprimir").click(function(){
                event.preventDefault();
                
                $.ajax({
                    url : '../controller/listado_print.controller.php',
                    data : { txtfecinicio : fecinicio.value , txtfecfinal: fecfinal.value},
                    type : 'get',
                    success : function(res) {
                        
                        window.open(res, '_blank');
                    },
                    error : function(error) {
                        alert('Disculpe, existió un problema');
                    }
                });
            });
        });

        function exportTableToExcel(tableID, filename = ''){
            
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById("tableID");
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            
            // Specify file name
            filename = filename?filename+'.xls':'excel_data.xls';
            
            // Create download link element
            downloadLink = document.createElement("a");
            
            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
            }
        }
    </script>  

<?php
include "footer.html"; 
?>