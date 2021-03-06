
// script datatables
function datatables(tbl, order, orderable){
  var colOrder = order.split("-")[0];
  colOrder = (colOrder=="" || isNaN(colOrder))? "0": colOrder;
  var colOrderVal = order.split("-")[1];
  colOrderVal = (colOrderVal!="asc" && colOrderVal!="desc")? "asc": colOrderVal;
  var targetOrderable = orderable.split("-")[0];
  targetOrderable = (targetOrderable=="" || isNaN(targetOrderable))? "0": targetOrderable;
  var Orderable = orderable.split("-")[1];
  if(Orderable == 'true'){
    Orderable = true;
  }else if(Orderable=="false"){
    Orderable = false;
  }else{
    Orderable = true;
  }
  $(tbl).DataTable({
    "columnDefs": [{ "orderable": Orderable, "targets": parseInt(targetOrderable) }],
    "order": [[ colOrder, colOrderVal ]]
  });
}

function datatablesSearch(tbl, order, orderable){
  var colOrder = order.split("-")[0];
  colOrder = (colOrder=="" || isNaN(colOrder))? "0": colOrder;
  var colOrderVal = order.split("-")[1];
  colOrderVal = (colOrderVal!="asc" && colOrderVal!="desc")? "asc": colOrderVal;
  var targetOrderable = orderable.split("-")[0];
  targetOrderable = (targetOrderable=="" || isNaN(targetOrderable))? "0": targetOrderable;
  var Orderable = orderable.split("-")[1];
  if(Orderable == 'true'){
    Orderable = true;
  }else if(Orderable=="false"){
    Orderable = false;
  }else{
    Orderable = true;
  }

  $(tbl+' thead th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="Search '+title+'" style="width: 100%"/>' );
  });

  $(tbl+" thead tr .colInfo").html("");

  var table = $(tbl).DataTable({
    "columnDefs": [{ "orderable": Orderable, "targets": parseInt(targetOrderable) }],
    "order": [[ colOrder, colOrderVal ]]
  });

  table.columns().every( function () {
    var that = this;
    $( 'input', this.header() ).on( 'keyup change', function () {
      if (that.search() !== this.value) {
        that.search(this.value).draw();
      }
    });
  });
}

function resetTable(url, target){
  showLoading();
  $(target).load(url, function(responseTxt, statusTxt, xhr){
    if(statusTxt == "success"){
      //aksi ketika sukses
    hideLoading();
    }
    if(statusTxt == "error"){
      alert("Error: " + xhr.status + ": " + xhr.statusText, "error");
      hideLoading();
    }
  });
}
// end script datatables

// _popup button pada setiap record
function trpopup(id){
  $('#trpopup'+id).popover("show");
}
// popover close by outside click
$('body').on('click', function (e) {
  $('[data-toggle=popover]').each(function () {
    // hide any open popovers when the anywhere else in the body is clicked
    if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
      $(this).popover('hide');
    }
  });
});
// close popover
function closepopup(){
  $('[data-toggle="popover"]').popover("hide");
}
// _end popup button pada setiap record

// fungsi alert
$(document).ready(function(){
  $("#alert").hide();
  // test
  // alert("oke", "success");
})
function closeAlert(){
  $("#alert").hide("fast");
  $("#alert").attr("style", "background: null");
  $("#alert #msgAlert").html("");
}
function alert(msg, bgcolor){
  if(bgcolor=="success"){
    bgcolor="rgba(0, 255, 0, 0.4)";
  }else if(bgcolor=="error"){
    bgcolor="rgba(255, 0, 0, 0.4)";
  }else if(bgcolor=="info"){
    bgcolor="rgba(0, 0, 255, 0.4)";
  }
  $("#alert").show("fast");
  $("#alert").attr("style", "background: "+bgcolor);
  $("#alert #msgAlert").html(msg);
}
// end fungsi alert

// fungsi alertPopup
function alertPopup(msg){
  $(".alertPopup").fadeIn(400).delay(1500).fadeOut(400);
  $(".alertPopup").html(msg);
}
$(document).ready(function(){
  // alertPopup("test");
})
// end fungsi alertPopup

// text to uppercase
function upper(){
  $(".upper").keyup(function(e){
    var x = document.getElementById(this.id);
    x.value = x.value.toUpperCase();
  })
}
$(document).ready(function(){
  upper();
})
// end text to uppercase

// text to number format
function numFormat(f){
  $(".number").keyup(function(e){
    this.value = numeral(this.value).format(f);
  })
}
$(document).ready(function(){
  numFormat("0,0");
})
// end text to number format

// hide loading img
$(document).ready(function(){
  hideLoading();
})
function showLoading(){
  $(".loading").fadeIn("fast");
}
function hideLoading(){
  $(".loading").fadeOut("slow");
}
// end hide loading img

// Gijgo Datetime picker
function gijgoDate(){
  var jmlGijgo = $(".gijgo").length;
  if(jmlGijgo > 0){
    var i;
    for(i=0; i<jmlGijgo; i++){
      idGijgo = "#"+$(".gijgo")[i].id
      // console.log(idGigjo);
      $(idGijgo).datepicker({ 
        footer: true, 
        modal: true,
        uiLibrary: '',
        format: 'dd-mm-yyyy'
      });
    }
  }
  $(".gijgo").attr("autocomplete", "off");
}
$(document).ready(function(){
  gijgoDate();
})
// end Gijgo Datetime picker

// Copy to clipboard
function copyText(elementId) {

  // Create an auxiliary hidden input
  var aux = document.createElement("input");

  // Get the text from the element passed into the input
  aux.setAttribute("value", document.getElementById(elementId).innerHTML);

  // Append the aux input to the body
  document.body.appendChild(aux);

  // Highlight the content
  aux.select();

  // Execute the copy command
  document.execCommand("copy");

  // Remove the input from the body
  document.body.removeChild(aux);

}
// End Copy to clipboard

// add Disabled
function addDisabled(tipe, target){
  if(tipe=="1"){
    $(target).removeAttr("disabled");
  }else if(tipe=="0")
    $(target).attr("disabled", "");
}
// end add Disabled

// inputmask datetime
function inputDateTime(){
  // Initialize InputMask
  $(".dateMY").inputmask({
    alias: "datetime",
    inputFormat: "mm-yyyy",
    placeholder: "mm-yyyy",
    imInsert: "false"
  });

  $(".datetime").inputmask({
    alias: "datetime",
    inputFormat: "dd-mm-yyyy HH:MM",
    placeholder: "dd-mm-yyyy hh:mm",
    imInsert: "false"
  });
}

$(document).ready(function(){
  inputDateTime();
})
// end inputmask datetime

// Bootstrap Material datetime
function dateTimePicker(){
  $(".datepicker").bootstrapMaterialDatePicker({
    format: 'DD-MM-YYYY',
    clearButton: false,
    weekStart: 1,
    time: false,
    // minDate: '12-09-2019 12:00'
  });
  $(".datetimepicker").bootstrapMaterialDatePicker({
    format: 'DD-MM-YYYY HH:mm',
    clearButton: false,
    weekStart: 1,
    time: true,
    // minDate: '12-09-2019 12:00'
  });
  $(".datepickerMY").bootstrapMaterialDatePicker({
    format: 'MM-YYYY',
    clearButton: false,
    weekStart: 1,
    time: false,
    // minDate: '12-09-2019 12:00'
  });
}

$(document).ready(function(){
  dateTimePicker();
})
// End Bootstrap Material datetime

// text to nomor surat format
function noSuratFormat(){
  $('.nosurat').mask('00-AA-00', {reverse: false});
}
$(document).ready(function(){
  noSuratFormat();
})
// end text to nomor surat format

// jam
function jam(url, target){
  setInterval(function(){

    var date = new Date();

    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    var jamsekarang = ("0" + hours).slice(-2) + ":" + ("0" + minutes).slice(-2) + ":" + ("0" + seconds).slice(-2);

    $(target).html(jamsekarang);
  }, 1000);
}

$(document).ready(function(){
  jam("<?= base_url('jam') ?>", "#jam");
})
// END jam