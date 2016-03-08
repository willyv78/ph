<style type="text/css">
    @import "../libraries/dataTables/media/css/demo_page.css";
    @import "../libraries/dataTables/media/css/demo_table.css";
    @import "../libraries/dataTables/extras/TableTools/media/css/TableTools.css";
</style>
<script src="../libraries/dataTables/media/js/jquery.js"></script>
<script src="../libraries/dataTables/media/js/jquery.dataTables.js"></script>
<script src="../libraries/dataTables/media/js/jquery.dataTables.min.js"></script>
<script src="../libraries/dataTables/media/js/jquery.jeditable.js"></script>
<script src="../libraries/dataTables/extras/TableTools/media/js/TableTools.js"></script>
<script src="../libraries/dataTables/extras/TableTools/media/js/TableTools.min.js"></script>
<script src="../libraries/dataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
<script>jQuery.noConflict();/*es importate para que funcione con el motools y las funciones readcy se inician con jQuery(document).ready(function($)*/</script>

<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function($) {

        var table = $('#tabla').dataTable({
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ resultados por página",
                "sZeroRecords": "No se encontraron resultados",
                "sInfo": "Mostrando del _START_ al _END_ de _TOTAL_ resultados",
                "sInfoEmpty": "Mostrando del 0 al 0 de 0 resultados",
                "sInfoFiltered": "(Filtrado _MAX_ de los resultados totales)",
                "sSearch": "Buscar: ",
                "oPaginate": {
                    "sPrevious": "Anterior",
                    "sNext": "Siguiente",
                    "sFirst": "Inicio",
                    "sLast": "Fin"
                }

            },
            "sDom": 'T<"clear">lfrtip',
            "oTableTools": {
                "aButtons": [
                    {
                        "sExtends": "copy",
                        "sButtonText": "Copiar"
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "Imprimir"
                    },
                    {
                        "sExtends": "collection",
                        "sButtonText": "Exportar",
                        "aButtons": [
                            "csv",
                            {
                                "sExtends": "xls",
                                "sFileName": "*.xls"
                            },
                            {
                                "sExtends": "pdf",
                                "sPdfOrientation": "landscape"
                            }
                        ]
                    }
                ]
            },
            "bJQueryUI": false,
            "sPaginationType": "full_numbers",
            "aaSorting": []
        });
        $('#result').slideDown(1000);

        $("#tabla tbody tr").click(function(e) {
            if ($(this).hasClass('row_selected')) {
                $(this).removeClass('row_selected');
            }
            else {
                table.$('tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            }
        });

        /*ini para los filtros individuales*/
        $('#tabla tfoot th').each(function() {
            var title = $('#tabla thead th').eq($(this).index()).text();
            $(this).html('<input type="text" placeholder="' + title + '" />');
        });
        $("tfoot input").keyup(function() {
            /* Filter on the column (the index) of this element */
            table.fnFilter(this.value, $("tfoot input").index(this));
        });
        var asInitVals = [];
        $("tfoot input").each(function(i) {

            asInitVals[i] = this.value;
        });

        $("tfoot input").focus(function() {
            if (this.className == "search_init")
            {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function(i) {
            if (this.value == "")
            {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
        /*fin filtros individuales*/


    });/*fin del dom ready*/


    function fnGetSelected(oTableLocal) {
        return oTableLocal.$('tr.row_selected');
    }
</script>