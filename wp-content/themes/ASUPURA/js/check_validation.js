
        var inputs = document.forms['myForm'].getElementsByClassName('form-control');
        var run_onchange = false;
        
        function valid(){
            var errors = false;
            var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z0-9]+)+$/;
            for(var i=0; i<inputs.length; i++){
                var value = inputs[i].value;
                 var id = inputs[i].getAttribute('id');
       
                // Tao message
                var sMessage = document.createElement('div');
                sMessage.className = "message_error";
                // Neu sMessage da ton tai thi remove
                var p = inputs[i].parentNode;
                if(p.lastChild.nodeName == 'DIV') {p.removeChild(p.lastChild);}
       
                // Kiem tra NULL
                if(value == ''){
                    sMessage.innerHTML ='※入力に不備がございます。';
                    }else{
                        // Kiem tra truong hop khac
                        if(id == 'vv-email'){
                            if(reg_mail.test(value) == false){ sMessage.innerHTML ='※メールアドレスは違いがあります。';}
                            var email =value;
                    }
                }
   
                // is error then views message
                if(sMessage.innerHTML != ''){
                    inputs[i].parentNode.appendChild(sMessage);
                    errors = true;
                    run_onchange = true;
                    inputs[i].style.border = '1px solid #c6807b';
                    inputs[i].style.background = '#fffcf9';
                }
            }// end for
  
            if(errors == true){return !errors;}
        }// end valid()

        function checkCheckBoxes(theForm) {
            if (
            theForm.check_detail.checked == false) 
            {
                alert('※個人情報取扱い同意書に同意する');
                return false;
            } else {    
                return true;
            }
        }

 
        // check valid()
        var register = document.getElementById('comment-submit');

        register.onclick = function(){
            return valid();
        }
        
 
        // event onchange -> valid()
        for(var i=0; i<inputs.length; i++){
            var id = inputs[i].getAttribute('id');
            inputs[i].onchange = function(){
                if(run_onchange == true){
                    this.style.border = '1px solid #999';
                    this.style.background = '#fff';
                    valid();
                }
            }
        }// end for