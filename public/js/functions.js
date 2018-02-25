/**
 * Funções tirada da internet para maior agilidade
 */

function cpfMask(cpf){
    cpf=cpf.replace(/\D/g,"");
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2");
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2");
    cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return cpf;
}

function cepMask(cep){
    cep=cep.replace(/\D/g,"")
    cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
    cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
    return cep;
}

function isCep(strCEP, blnVazio)
{
    let objER = /^[0-9]{2}.[0-9]{3}-[0-9]{3}$/;
 
    strCEP = strCEP.trim();

    if (strCEP.length > 0) {
        return objER.test(strCEP);
    }
    
    return blnVazio;
}

function cnpjMask(valorDoTextBox) {
    if (valorDoTextBox.length <= 14) {  
        //Coloca ponto entre o segundo e o terceiro dígitos
        valorDoTextBox = valorDoTextBox.replace(/^(\d{2})(\d)/, "$1.$2")

        //Coloca ponto entre o quinto e o sexto dígitos
        valorDoTextBox = valorDoTextBox.replace(/^(\d{2})\.(\d{3})(\d)/, "$1 $2 $3")

        //Coloca uma barra entre o oitavo e o nono dígitos
        valorDoTextBox = valorDoTextBox.replace(/\.(\d{3})(\d)/, ".$1/$2")

        //Coloca um hífen depois do bloco de quatro dígitos
        valorDoTextBox = valorDoTextBox.replace(/(\d{4})(\d)/, "$1-$2") 
    }

    return valorDoTextBox;
}

function removeMarks(str) {
    return str
        .split('.').join('')
        .split('-').join('')
        .split(' ').join('')
        .split('/').join('');
}
