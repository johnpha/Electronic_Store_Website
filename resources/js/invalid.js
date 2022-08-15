function invalid(options){

    var selectorRules = {};

    // chheck loi chua dien gi vao input
    function checkErrorEmpty(inputElement,rule){
        var errorMessage ;
        var elementError = inputElement.parentElement.querySelector(options.errorSelector);
        
        // lay ra cac rule cua selector
        var rules = selectorRules[rule.selector];
        
        // console.log(rules);
        for(var i=0;i<rules.length; i++){
            errorMessage = rules[i](inputElement.value);
            
            if(errorMessage){
                inputElement.focus();
                break;
            }
        }
        // console.log(inputElement);
        if(errorMessage){
           
            elementError.innerText = errorMessage;
            
            inputElement.parentElement.classList.add('invalid');
        }else{
            elementError.innerText = "";
           
            inputElement.parentElement.classList.remove('invalid');

        }
        return !errorMessage;
    }
    
    function checkErrorUserInput (inputElement){
        var elementError = inputElement.parentElement.querySelector(options.errorSelector);
        elementError.innerText = "";
        inputElement.parentElement.classList.remove('invalid');

    }

    var formElement = document.querySelector(options.form);

    if(formElement){
        
        formElement.onsubmit = function(e){
            
            e.preventDefault();

            var isFormValid = true;
            
            options.rules.forEach(function(rule){               
               var inputElement = formElement.querySelector(rule.selector);
                var isValid = checkErrorEmpty(inputElement,rule);     
                    
                if(!isValid){
                    isFormValid = false;
                }
            });

            if(isFormValid){
               formElement.submit();
               
            }
            
        }

        // lap qua moi rule va xu ly event
        options.rules.forEach(function(rule){
            if(Array.isArray(selectorRules[rule.selector])){
                selectorRules[rule.selector].push(rule.test);
            }else{
                selectorRules[rule.selector]=[rule.test];
            }

            var inputElement = formElement.querySelector(rule.selector);

            if(inputElement){
                // xu ly truong hop blur ra ngoai
                inputElement.onblur = function(){
                   checkErrorEmpty(inputElement,rule);
                }
                // xử lí mỗi khi người dùng nhập vào input
                inputElement.oninput = function(){
                   checkErrorUserInput(inputElement);
                }
            }
        });
    }

}

invalid.isRequired = function(selector,message){
    return{
        selector:selector,
        test: function(value){
            return value.trim() ? undefined : message || 'Vui lòng nhập trường này !!';
        }
    }
}
invalid.isConfrimValue = function(selector,getConfrimValue,message){
    return{
        selector:selector,
        test: function(value){
            return value == getConfrimValue() ? undefined : message || 'Password nhập lại không chính xác !!';
        }
    }
}
invalid.isMinLength = function(selector,min,message){
    return{
        selector:selector,
        test: function(value){
            return value.length>=min ? undefined : message || `Vui lòng nhập tối thiểu ${min} kí tự `;
        }
    }
}
invalid.isPhone = function(selector,message){
    return{
        selector: selector,
        test: function(value){
            var regex = /^0\d{2}[-\s]?\d{3}[-\s]?\d{4}$/;
            return regex.test(value) ? undefined : message || 'Vui lòng nhập số điện thoại';
        }
    }
}
invalid.isEmail = function(selector,message){
    return{
        selector: selector,
        test: function(value){
            var regex = /^\w+@[a-zA-Z]{3,}\.com$/i;
            return regex.test(value) ? undefined : message || 'Email bạn nhập không hợp lệ !!';
        }
    }
}