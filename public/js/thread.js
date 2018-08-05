/*
        Thread.index javascript
        @author Cynthia Dewi 
        @version 04/08/2018
     */

     // https://stackoverflow.com/questions/29321494/show-input-field-only-if-a-specific-option-is-selected
    function yesnoCheck(that) {
    if (that.value == "other") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
    }

    function showemail() {
            document.getElementById("showclick").style.display = "block";
        }