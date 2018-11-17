function validateInput ()
{
	var firstName 	= document.getElementById("firstName");
	var secondName 	= document.getElementById("secondName");
	var middleName 	= document.getElementById("middleName");
	var jobTitle 	= document.getElementById("jobTitle");
	
	var errFN	= document.getElementById("errFN");
	var errSN	= document.getElementById("errSN");
	var errMN	= document.getElementById("errMN");
	var errJT	= document.getElementById("errJT");
	
	
	var patternName = /^[a-zA-Zа-яА-Я]{2,49}$/
	var patternJobTitle = /^[a-zA-Zа-яА-Я]+[a-zA-Zа-яА-Я0-9_\s,:;!\?\*@#№%&\.<>-]{2,49}$/ //.,:;!?*@#№%&
		
	var resultName = patternName.test(firstName.value);
	var resultSName = patternName.test(secondName.value);
	var resultMName = patternName.test(middleName.value);
	var resultJTitle = patternJobTitle.test(jobTitle.value);
	
	if (firstName.value != '' && resultName == false)
	{
		errFN.innerHTML = "Имя должно состоять минимум из двух букв русского или латинского алфавита. Возможно использование символа '-'.";
	}
		
	if (secondName.value != '' && resultSName == false)
	{
		errSN.innerHTML = "Фамилия должна состоять минимум из двух букв русского или латинского алфавита. Возможно использование символа '-'.";
	}
		
	if (middleName.value != '' && resultMName == false)
	{
		errMN.innerHTML = "Отчество должно состоять минимум из двух букв русского или латинского алфавита.";
	}
		
	if (jobTitle.value != '' && resultJTitle == false)
	{
		errJT.innerHTML = "Название должности должно состоять минимум из двух букв русского или латинского алфавита. Далее возможно использование любых символов и знаков.";
	}
	
	if (firstName.value == '' || resultName == true)
	{
		errFN.innerHTML = '';
	}
		
	if (secondName.value == '' || resultSName == true)
	{
		errSN.innerHTML = '';
	}
		
	if (middleName.value == '' || resultMName == true)
	{
		errMN.innerHTML = '';
	}
		
	if (jobTitle.value == '' || resultJTitle == true)
	{
		errJT.innerHTML = '';
	}
			
	if (patternName.test(firstName.value) == true && patternName.test(secondName.value) == true && patternName.test(middleName.value) == true && patternJobTitle.test(jobTitle.value) == true)
	{
		save(firstName.value, secondName.value, middleName.value, jobTitle.value);
		errFN.innerHTML = '';
		errSN.innerHTML = '';
		errMN.innerHTML = '';
		errJT.innerHTML = '';
	}
}

function save(firstName, secondName, middleName, jobTitle)
{
    if (window.localStorage)
	{  // Only do this if the browser supports it
        localStorage.firstName = firstName;
        localStorage.secondName = secondName;
        localStorage.middleName = middleName;
        localStorage.jobTitle = jobTitle;
    }
}

// Automatically attempt to restore input fields when the document first loads.
window.onload = function() {
    // If the browser supports localStorage and we have some stored data
    if (window.localStorage && localStorage.jobTitle) {  
        document.getElementById("firstName").value = localStorage.firstNamet;
        document.getElementById("secondName").value = localStorage.secondName;
        document.getElementById("middleName").value = localStorage.middleName;
        document.getElementById("jobTitle").value = localStorage.jobTitle;
    }
};

