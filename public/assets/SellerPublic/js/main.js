function mystock(){
    if (document.getElementById('stockcheck').checked) {
        document.getElementById('stockdropdown').style.visibility = 'visible';
    }
    else document.getElementById('stockdropdown').style.visibility = 'hidden';
}
function myprice(){
    if (document.getElementById('pricecheck').checked) {
        document.getElementById('pricedropdown').style.visibility = 'visible';
    }
    else document.getElementById('pricedropdown').style.visibility = 'hidden';
}

function GenerateSKU(){
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ345678abcdefghiklmnopqrstuvwxyz";
	var string_length = 8;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
    }
    randomstring = 'SKU-'+ randomstring;
    document.getElementById('SKU').value = randomstring;
}

function Gallery(){
    if (document.getElementById('gallery').checked) {
        document.getElementById('fileDropdown').style.visibility = 'hidden';
        document.getElementById('gallerydropdown').style.visibility = 'visible';
    }
    else document.getElementById('gallerydropdown').style.visibility = 'hidden';
}

function fileInput(){
    if (document.getElementById('fileinput').checked) {
        document.getElementById('gallerydropdown').style.visibility = 'hidden';
        document.getElementById('fileDropdown').style.visibility = 'visible';
    }
    else document.getElementById('fileDropdown').style.visibility = 'hidden';
}

function get_subcategories(id)
{
    var value = id;
    console.log(value);
    // var _token = $('input[name="_token"]').val();
    $.ajax({
        
        url:'/category/child',
        type:"get", 
        data : {id:value},
        success:function(data){

            // var Data = JSON.parse(data);
            // console.log(data);
           $('#childCategory').empty();
           $('#childCategory').append('<option value="" disabled selected>Select Sub Category</option>');
           data.forEach(element => {
                $('#childCategory').append(`<option value="${element['id']}">${element['name']}</option>`);
           });
            
        }

    })
    // console.log();
}

function validateAndSend() {
    if (myForm.input_image.value == '' && myForm.gallery_image.value == '') {
        alert('You have to Upload Image.');
        return false;
    }
    if (!myForm.stockalert.value=='') {
        if(myForm.stockalert.value >= myForm.stock.value)
        {
            alert('Invalid Stock Alert value.');  
            return false; 
        }
        
    }
    if (!myForm.specialprice.value=='') {
        if(myForm.specialprice.value > myForm.price.value)
        {
            alert('Invalid Special Price value.');  
            return false; 
        } 
    }
    else {
        // myForm.submit();
        }
    
}

$('.add_Row').on('click', function() {
    addRow();
});

function addRow() {
    var tr =
        '<tr><td><input type="text" class="form-control" name="attribute[]"></td><td><input type="text" class="form-control" name="value[]"></td><td><a href="#!" class="btn btn-outline-danger remove_row rounded-circle"> <i class="fa fa-minus mt-1"></i></a></td></tr>';
    $('tbody').append(tr);
}
$('tbody').on('click', '.remove_row', function() {
    $(this).parent().parent().remove();
});
