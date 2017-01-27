String.format = function() {
    // The string containing the format items (e.g. "{0}")
    // will and always has to be the first argument.
    var theString = arguments[0];
    
    // start with the second argument (i = 1)
    for (var i = 1; i < arguments.length; i++) {
        // "gm" = RegEx options for Global search (more than one instance)
        // and for Multiline search
        var regEx = new RegExp("\\_" + (i - 1) + "\\_", "gm");
        theString = theString.replace(regEx, arguments[i]);
    }
    
    return theString;
}

function setZeroMask( id ){
    
    var obj  = $("#" + id);
    var size = obj.attr("maxlength");

    obj.inputmask();
 
    obj.focusout(function(){

        var value = $(this).val();

        if( value.length > 0 ){

            while (value.length < size){
              value = "0" + value;  
            } 
            
            $(this).val(value);

        }

    });

}

function formatDecimal( fieldId ){

    var value = String($("#" + fieldId).val()*100);
    $("#" + fieldId).maskMoney("mask", parseFloat( value.slice( 0, value.length - 2 ) + ',' + value.slice( value.length - 2 ) ) );

}

function unformatDecimal( fieldId ){
    $("#" + fieldId).val($("#" + fieldId).maskMoney('unmasked')[0]);
}

