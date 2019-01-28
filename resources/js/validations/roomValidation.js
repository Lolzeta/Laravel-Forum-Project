document.addEventListener('DOMContentLoaded',function(){
  let boton = document.getElementById('saveRoom');
  boton.addEventListener('click',function(event){
    event.preventDefault();
    if(validateNameExist() && validateLenghtName() && validateLenghtCreator() && validateCreatorExist() && validateCathegoryExist() && validateLenghtCathegory() && validateDescriptionExist() && validateLenghtDescription()){
      checkAllValidations();
    } else{
      event.submit();
    }
  })
})

function validateLenghtName(){
  let validated = false;
  let name = document.getElementById('name').value;
  if(name>=3){
    validated = true;
  }
  return validated
}

function validateNameExist(){
  let validated = false;
  let name = document.getElementById('name').value;
  if(name===""){
    validated = true;
  }
  return validated;
}

function validateLenghtCathegory(){
  let validated = false;
  let cathegory = document.getElementById('cathegory').value;
  if(cathegory>=5){
    validated = true;
  }
  return validated
}

function validateCathegoryExist(){
  let validated = false;
  let cathegory = document.getElementById('cathegory').value;
  if(cathegory===""){
    validated = true;
  }
  return validated;
}

function validateLenghtCreator(){
  let validated = false;
  let creator = document.getElementById('creator').value;
  if(creator>=5){
    validated = true;
  }
  return validated
}

function validateCreatorExist(){
  let validated = false;
  let creator = document.getElementById('creator').value;
  if(creator===""){
    validated = true;
  }
  return validated;
}

function validateLenghtDescription(){
  let validated = false;
  let description = document.getElementById('description').value;
  if(description>=10){
    validated = true;
  }
  return validated
}

function validateDescriptionExist(){
  let validated = false;
  let description = document.getElementById('description').value;
  if(description===""){
    validated = true;
  }
  return validated;
}

function checkAllValidations(){
  let validated = false;
  let validatedName = true;
  let validatedCreator = true;
  let validatedCathegory = true;
  let validatedDescription = true;
  if(!validateNameExist){
    if(!document.getElementById('nameError')){
      let error = document.createElement('div');
      error.setAttribute('id','nameError');
      error.innerHTML = "The room name is needed";
      document.getElementById('name').appendChild(error);
    } else{
      let error = document.getElementById('nameError');
      error.innerHTML = "";
      error.innerHTML = "The room name is needed";
    }
    validatedName = false;
  }

  if(!validateLenghtName){
    if(!document.getElementById('nameError')){
      let error = document.createElement('div');
      error.setAttribute('id','nameError');
      error.innerHTML = "The room name need to have three characters or more";
      document.getElementById('name').appendChild(error);
    } else{
      let error = document.getElementById('nameError');
      error.innerHTML = "";
      error.innerHTML = "The room name need to have three characters or more";
    }
    validatedName = false;
  }

  if(!validateCreatorExist){
    if(!document.getElementById('creatorError')){
      let error = document.createElement('div');
      error.setAttribute('id','creatorError');
      error.innerHTML = "The room creator is needed";
      document.getElementById('creator').appendChild(error);
    } else{
      let error = document.getElementById('creatorError');
      error.innerHTML = "";
      error.innerHTML = "The room creator is needed";
    }
    validatedCreator = false;
  }

  if(!validateLenghtCreator){
    if(!document.getElementById('creatorError')){
      let error = document.createElement('div');
      error.setAttribute('id','creatorError');
      error.innerHTML = "The room creator need to have five characters or more";
      document.getElementById('creator').appendChild(error);
    } else{
      let error = document.getElementById('creatorError');
      error.innerHTML = "";
      error.innerHTML = "The room creator need to have five characters or more";
    }
    validatedCreator = false;
  }

  if(!validateCathegoryExist){
    if(!document.getElementById('cathegoryError')){
      let error = document.createElement('div');
      error.setAttribute('id','cathegoryError');
      error.innerHTML = "The room cathegory is needed";
      document.getElementById('cathegory').appendChild(error);
    } else{
      let error = document.getElementById('cathegoryError');
      error.innerHTML = "";
      error.innerHTML = "The room cathegory is needed";
    }
    validatedCathegory = false;
  }

  if(!validateLenghtCathegory){
    if(!document.getElementById('cathegoryError')){
      let error = document.createElement('div');
      error.setAttribute('id','cathegoryError');
      error.innerHTML = "The room cathegory need to have five characters or more";
      document.getElementById('cathegory').appendChild(error);
    } else{
      let error = document.getElementById('cathegoryError');
      error.innerHTML = "";
      error.innerHTML = "The room cathegory need to have five characters or more";
    }
    validatedCathegory = false;
  }

  if(!validateDescriptionExist){
    if(!document.getElementById('descriptionError')){
      let error = document.createElement('div');
      error.setAttribute('id','descriptionError');
      error.innerHTML = "The room description is needed";
      document.getElementById('description').appendChild(error);
    } else{
      let error = document.getElementById('descriptionError');
      error.innerHTML = "";
      error.innerHTML = "The room description is needed";
    }
    validatedDescription = false;
  }

  if(!validateLenghtDescription){
    if(!document.getElementById('descriptionError')){
      let error = document.createElement('div');
      error.setAttribute('id','descriptionError');
      error.innerHTML = "The room description need to have ten characters or more";
      document.getElementById('description').appendChild(error);
    } else{
      let error = document.getElementById('descriptionError');
      error.innerHTML = "";
      error.innerHTML = "The room description need to have ten characters or more";
    }
    validatedDescription = false;
  }

  if(validatedName){
    if(document.getElementById('nameError')){
      document.getElementById('name').removeChild(document.getElementById('nameError'));
    }
  }

  if(validatedCreator){
    if(document.getElementById('creatorError')){
      document.getElementById('creator').removeChild(document.getElementById('creatorError'));
    }
  }

  if(validateCathegory){
    if(document.getElementById('cathegoryError')){
      document.getElementById('cathegory').removeChild(document.getElementById('cathegoryError'));
    }
  }
  if(validatedDescription){
    if(document.getElementById('descriptionError')){
      document.getElementById('description').removeChild(document.getElementById('descriptionError'));
    }
  }
  if(validatedName && validatedCreator && validateCathegory && validatedDescription){
    validated = true;
  }
    return validated;
  }
}
