const multiStepForm = document.querySelector("[data-multi-step]")
const formSteps = [...multiStepForm.querySelectorAll("[data-step]")]
let currentStep = formSteps.findIndex((step) => 
{
     return step.classList.contains("active")
})
if(currentStep < 0)
{
    currentStep = 0
    showCurrentStep()
}
multiStepForm.addEventListener("click", e =>
{
    let incrementor
    if(e.target.matches("[data-next]"))
    {
        incrementor = 1
        const inputs = [...formSteps[currentStep].querySelectorAll("input")]
        const allValid = inputs.every(input => input.reportValidity())
        if(allValid)
        {
            currentStep +=incrementor
            showCurrentStep()
        }
    }
    else if(e.target.matches("[data-previous]"))
    {
        incrementor = -1
        currentStep +=incrementor
        showCurrentStep()
    }
    if(incrementor == null)
    {
        return
    }
})
function showCurrentStep()
{
    formSteps.forEach((step, index) => 
    {
        step.classList.toggle("active", index === currentStep)
    })
    if (currentStep === formSteps.length - 1) 
    {
        document.querySelector(".rekomenduojama_galia").style.visibility = "hidden";
    } 
    else 
    {
        document.querySelector(".rekomenduojama_galia").style.visibility = "visible";
    }
}
  
document.addEventListener("DOMContentLoaded", function() 
{
    var kitaRadio = document.getElementById("kita");
    var kitaInput = document.getElementById("kita_danga");
    var otherRadios = document.querySelectorAll("input[name='danga']:not(#kita)")
    kitaRadio.addEventListener("change", function() 
    {
        if (kitaRadio.checked) 
        {
            kitaInput.setAttribute("required", "");
        } 
        else 
        {
            kitaInput.removeAttribute("required");
        }
    });
    otherRadios.forEach(function(el)
    {
        el.addEventListener("change", function()
        {
            kitaInput.removeAttribute("required");
            kitaInput.setCustomValidity('');
        });
    });

});

function validateMontavimas() 
{
    const form = document.querySelectorAll(".montavimas");
    let selected = false;
    form.forEach(el => 
    {
        if(el.checked)
        {
            selected = true;
        }
    });
    if (!selected) 
    {
        form[0].setCustomValidity("Prašome pasirinkti viena iš variantų!");
    } 
    else 
    {
        form[0].setCustomValidity("");
    }
    form[0].reportValidity();
}
function validatePuse() 
{
    const form = document.querySelectorAll(".puse");
    let selected = false;
    form.forEach(el => 
    {
        if(el.checked)
        {
            selected = true;
        }
    });
    if (!selected) 
    {
        form[0].setCustomValidity("Prašome pasirinkti viena iš variantų!");
    } 
    else 
    {
        form[0].setCustomValidity("");
    }
    form[0].reportValidity();
}
function validateSeselis() 
{
    const form = document.querySelectorAll(".seselis");
    let selected = false;
    form.forEach(el => 
    {
        if(el.checked)
        {
            selected = true;
        }
    });
    if (!selected) 
    {
        form[0].setCustomValidity("Prašome pasirinkti viena iš variantų!");
    } 
    else 
    {
        form[0].setCustomValidity("");
    }
    form[0].reportValidity();
}
function validateDanga() 
{
    const form = document.querySelectorAll(".danga");
    let selected = false;
    form.forEach(el => 
    {
        if(el.checked)
        {
            selected = true;
        }
    });
    if (!selected) 
    {
        form[0].setCustomValidity("Prašome pasirinkti viena iš variantų!");
    } 
    else 
    {
        form[0].setCustomValidity("");
    }
    form[0].reportValidity();
}
function validateIvadas() 
{
    const form = document.querySelectorAll(".ivadas");
    let selected = false;
    form.forEach(el => 
    {
        if(el.checked)
        {
            selected = true;
        }
    });
    if (!selected) 
    {
        form[0].setCustomValidity("Prašome pasirinkti viena iš variantų!");
    } 
    else 
    {
        form[0].setCustomValidity("");
    }
    form[0].reportValidity();
}
function validateAtsiskaitymas() 
{
    const form = document.querySelectorAll(".atsiskaitymas");
    let selected = false;
    form.forEach(el => 
    {
        if(el.checked)
        {
            selected = true;
        }
    });
    if (!selected) 
    {
        form[0].setCustomValidity("Prašome pasirinkti viena iš variantų!");
    } 
    else 
    {
        form[0].setCustomValidity("");
    }
    form[0].reportValidity();
}
function validateParama() 
{
    const form = document.querySelectorAll(".parama");
    let selected = false;
    form.forEach(el => 
    {
        if(el.checked)
        {
            selected = true;
        }
    });
    if (!selected) 
    {
        form[0].setCustomValidity("Prašome pasirinkti viena iš variantų!");
    } 
    else 
    {
        form[0].setCustomValidity("");
    }
    form[0].reportValidity();
}

var numerisInput = document.getElementById('numeris');
numerisInput.addEventListener('input', function () 
{
    var numeris = numerisInput.value;
    var numerioIlgis = numeris.length;
    
    if (numerioIlgis < 12) 
    {
        numerisInput.setCustomValidity('Numeris per trumpas');
    }
    else if (numerioIlgis > 12)
    {
        numerisInput.setCustomValidity('Numeris per ilgas');
    }
    else 
    {
        numerisInput.setCustomValidity('');
    }
});

const suvartojimasInput = document.getElementById("suvartojimas");
const suvartojimasDisplay = document.getElementById("sunaudojimas");
const galia = document.getElementById("galia");
let suvartojimas = 0;
suvartojimasInput.addEventListener("input", calculateResult1);
function calculateResult1() 
{
    suvartojimas = parseFloat(suvartojimasInput.value) || suvartojimas;
    if (isNaN(suvartojimas) || suvartojimasInput.value === "") 
    {
        suvartojimas = 0;
    }
    document.querySelector('.sunaudojimas').innerHTML = suvartojimas;
    suvartojimas = suvartojimas * 12;
    let rekomenduojama_galia = 0;
    if (suvartojimas === 0) 
    {
        galia.innerHTML = 0 + " kW";
    } 
    else 
    {
        for (let i = 1100; i <= suvartojimas; i += 1100) 
        {
            rekomenduojama_galia++;
        }
        galia.innerHTML = rekomenduojama_galia + 1 + " kW";
    }
}
function save1() 
{
    var galia = document.getElementById("galia").innerText;
    if (!isNaN(parseFloat(galia))) 
    {
        window.savedTemp = parseFloat(galia);
    }
}

function calculateResult2() 
{
    const radioButtons = document.getElementsByName("puse");
    var originalValue = window.savedTemp;
    var number = originalValue;
    for (let i = 0; i < radioButtons.length; i++) 
    {
        if (radioButtons[i].checked) 
        {
            switch (radioButtons[i].value) 
            {
                case "Pietus (efektyvumas 98-100%)":
                    number = originalValue;
                    break;
                case "Pietryčių ir pietvakarių (efektyvumas 80-90%)":
                    number = originalValue * 1.2;
                    break;
                case "Rytų ir vakarų (efektyvumas 72-82%)":
                    number = originalValue * 1.28;
                    break;
                default:
                    break;
            }
            break;
        }
    }
    document.getElementById("galia").innerText = number.toFixed(2) + " kW";
}
function save2() 
{
    var galia = document.getElementById("galia").innerText;
    if ( !isNaN(parseFloat(galia))) 
    {
        window.savedTemp1 = parseFloat(galia);
    }
}
function calculateResult3() 
{
    const radioButtons = document.getElementsByName("seselis");
    var number = window.savedTemp1 || parseFloat(document.getElementById("galia").innerText);
    for (let i = 0; i < radioButtons.length; i++) 
    {
        if (radioButtons[i].checked) 
        {
            switch (radioButtons[i].value) 
            {
                case "Šešėlio nera":
                    number = window.savedTemp1;
                    break;
                case "Šešėlis - 15%":
                    number = window.savedTemp1 * 1.15;
                    break;
                case "Šešėlis - 25%":
                    number = window.savedTemp1 * 1.25;
                    break;
                default:
                    break;
            }
            break;
        }
    }
    document.getElementById("galia").innerText = number.toFixed(2) + " kW";
}
function save3() 
{
    var galia = document.getElementById("galia").innerText;
    if (!isNaN(parseFloat(galia))) 
    {
        window.savedTemp2 = parseFloat(galia);
    }
}

function calculateResult4() 
{
    const radioButtons = document.getElementsByName("atsiskaitymas");
    var originalValue = window.savedTemp2;
    var number = originalValue;
    for (let i = 0; i < radioButtons.length; i++) 
    {
        if (radioButtons[i].checked) 
        {
            switch (radioButtons[i].value) 
            {
            case "Už pasaugojimą apmokėsiu pinigiais":
                number = originalValue;
                break;
            case "Už elektros pasaugojimą tinkluose atsiskaitysiu kWh (+20%)":
                number = originalValue * 1.2;
                break;
            default:
                break;
            }
            break;
        }
    }
    document.getElementById("galia").innerText = number.toFixed(2) + " kW";
    document.getElementById("galia_input").value = number.toFixed(2);
}

// Generate two random numbers
const number1 = Math.floor(Math.random() * 10) + 1; // random number between 1 and 10
const number2 = Math.floor(Math.random() * 10) + 1; // random number between 1 and 10

// Update the HTML with the random numbers
const number1Element = document.getElementById('number1');
const number2Element = document.getElementById('number2');
number1Element.textContent = number1;
number2Element.textContent = number2;

// Calculate the correct answer
const correctAnswer = number1 + number2;

// Add event listener to the input field
const input = document.getElementById('apsauga');
input.addEventListener('change', function(event) 
{
    const value = parseInt(event.target.value);
    if (value !== correctAnswer) 
    {
        input.setCustomValidity('Neteisingas atsakymas');
    } 
    else 
    {
        input.setCustomValidity('');
    }
});