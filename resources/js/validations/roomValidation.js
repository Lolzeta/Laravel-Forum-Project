document.addEventListener('DOMContentLoaded',function(){
  let boton = document.getElementById('saveRoom');
  boton.addEventListener('click',function(event){
    event.preventDefault();
    if(validateNameExist() && validateLengthName() && validateLengthCreator() && validateCreatorExist() && validateCathegoryExist() && validateLengthCathegory() && validateDescriptionExist() && validateLengthDescription()){
      document.getElementById("saveForm").submit();
    } else{
      checkAllValidations();
    }
  })
})

function validateLengthName(){
  let validated = false;
  let name = trim(document.getElementById('name').value);
  if(name.length>=3){
    validated = true;
  }
  return validated
}

function validateNameExist(){
  let validated = true;
  let name = trim(document.getElementById('name').value);
  if(name===""){
    validated = false;
  }
  return validated;
}

function validateLengthCathegory(){
  let validated = false;
  let cathegory = trim(document.getElementById('cathegory').value);
  if(cathegory.length>=5){
    validated = true;
  }
  return validated
}

function validateCathegoryExist(){
  let validated = true;
  let cathegory = trim(document.getElementById('cathegory').value);
  if(cathegory===""){
    validated = false;
  }
  return validated;
}

function validateLengthCreator(){
  let validated = false;
  let creator = trim(document.getElementById('creator').value);
  if(creator.length>=5){
    validated = true;
  }
  return validated
}

function validateCreatorExist(){
  let validated = true;
  let creator = trim(document.getElementById('creator').value);
  if(creator===""){
    validated = false;
  }
  return validated;
}

function validateLengthDescription(){
  let validated = false;
  let description = trim(document.getElementById('description').value);
  if(description.length>=10){
    validated = true;
  }
  return validated
}

function validateDescriptionExist(){
  let validated = true;
  let description = trim(document.getElementById('description').value);
  if(description===""){
    validated = false;
  }
  return validated;
}

function checkAllValidations(){
  let validated = false;
  let validatedName = true;
  let validatedCreator = true;
  let validatedCathegory = true;
  let validatedDescription = true;
  if(!validateNameExist()){
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

  if(!validateLengthName()){
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

  if(!validateCreatorExist()){
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

  if(!validateLengthCreator()){
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

  if(!validateCathegoryExist()){
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

  if(!validateLengthCathegory()){
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

  if(!validateDescriptionExist()){
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

  if(!validateLengthDescription()){
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
