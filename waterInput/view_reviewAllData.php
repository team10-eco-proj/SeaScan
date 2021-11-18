<script>
// $(document).ready(function(){
//     $.ajax({
//         url: './waterInput/get_waterData.php',
//         type: 'POST',
//         success: function(response){
//             console.log(response);
//         }
//     });
// })


var waterTable = new Tabulator("#waterDataTable", {
    data:"./waterInput/get_waterData.php",           //load row data from array
    layout:"fitColumns",      //fit columns to width of table
    responsiveLayout:"hide",  //hide columns that dont fit on the table
    tooltips:true,            //show tool tips on cells
    addRowPos:"top",          //when adding a new row, add it to the top of the table
    history:true,             //allow undo and redo actions on the table
    pagination:"local",       //paginate the data
    paginationSize:7,         //allow 7 rows per page of data
    movableColumns:true,      //allow column order to be changed
    resizableRows:true,       //allow row order to be changed
    initialSort:[             //set the initial sort order of the data
        {column:"name", dir:"asc"},
    ],
    columns:[                 //define the table columns
        {title:"data_pk", field:"data_pk"},
        {title:"temp", field:"temp", hozAlign:"left", editor:true},
        {title:"salinity", field:"salinity", editor:true},
        {title:"grid_lat", field:"grid_lat"},
        {title:"grid_long", field:"grid_long", editor:"input"},
        {title:"log_time", field:"log_time"},
        {title:"user_fk", field:"user_fk"},
    ],
});
</script>
<div class="p-5">
    <div id="waterDataTable"></div>
</div>
