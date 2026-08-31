

// const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
// const currentTheme = localStorage.getItem('theme');

// if (currentTheme) {
//     document.documentElement.setAttribute('data-theme', currentTheme);

//     if (currentTheme === 'dark') {
//         toggleSwitch.checked = true;
//     }
// }

// function switchTheme(e) {
//     const bgLightElements = document.querySelectorAll('.bg-light');
//     const bgDarkElements = document.querySelectorAll('.bg-dark');
    
//     if (e.target.checked) {
//         document.documentElement.setAttribute('data-theme', 'dark');
//         localStorage.setItem('theme', 'dark');

//         bgLightElements.forEach(element => {
//             element.classList.remove('bg-light');
//             element.classList.add('bg-dark');
//         });
//     } else {
//         document.documentElement.setAttribute('data-theme', 'light');
//         localStorage.setItem('theme', 'light');

//         bgDarkElements.forEach(element => {
//             element.classList.remove('bg-dark');
//             element.classList.add('bg-light');
//         });
//     }
// }

// toggleSwitch.addEventListener('change', switchTheme, false);



// const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
// const currentTheme = localStorage.getItem('theme');


// if (currentTheme) {
//     document.documentElement.setAttribute('data-theme', currentTheme);
  
//     if (currentTheme === 'dark') {
//         toggleSwitch.checked = true;
//     }
// }

// function switchTheme(e) {
//     // const backgroundcolorclassname = document.getElementsByClassName("bg-light");
//     const backgroundcolorclassname = document.querySelectorAll('.bg-light');
//     const backgroundcolorblackclassname = document.querySelectorAll('.bg-dark');

//     const backgroundcolornavbarlight = document.querySelectorAll('.navbar-light');
//     const backgroundcolornavbardark = document.querySelectorAll('.navbar-dark');
    
//     if (e.target.checked) {
//         for(let i=0; i < backgroundcolorclassname.length; i++)
//             {
//                 backgroundcolorclassname[i].style.backgroundColor = "yellow";
//             }
//         document.documentElement.setAttribute('data-theme', 'dark');
//         localStorage.setItem('theme', 'dark');
       
        
//     }
//     else {       
//         for(let i=0; i < backgroundcolorblackclassname.length; i++)
//             {
//                 backgroundcolorblackclassname[i].style.backgroundColor = "white";
//             }
//              document.documentElement.setAttribute('data-theme', 'light');
//           localStorage.setItem('theme', 'light');
          
//     }    
// }

// toggleSwitch.addEventListener('change', switchTheme, false);

// Get the theme toggle switch
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

// Get the current theme from localStorage
const currentTheme = localStorage.getItem('theme');

// Function to apply the theme
function applyTheme(theme) {
    const bgLightElements = document.querySelectorAll('.bg-light');
    const bgDarkElements = document.querySelectorAll('.bg-dark');

    if (theme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
        bgLightElements.forEach(element => {
            element.classList.remove('bg-light');
            element.classList.add('bg-dark');
        });
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        bgDarkElements.forEach(element => {
            element.classList.remove('bg-dark');
            element.classList.add('bg-light');
        });
    }
}

// Apply the theme on page load
if (currentTheme) {
    applyTheme(currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}

// Function to switch the theme when the checkbox is toggled
function switchTheme(e) {
    if (e.target.checked) {
        applyTheme('dark');
        localStorage.setItem('theme', 'dark');
    } else {
        applyTheme('light');
        localStorage.setItem('theme', 'light');
    }
}

// Add an event listener to the toggle switch
toggleSwitch.addEventListener('change', switchTheme, false);

// Function to simulate a checkbox click
function simulateClick() {
    toggleSwitch.checked = !toggleSwitch.checked;
    const event = new Event('change');
    toggleSwitch.dispatchEvent(event);
}

// Simulate two checkbox clicks after 3 seconds on page load
window.onload = function() {
    if (currentTheme === 'dark') {
        setTimeout(() => {
            simulateClick();
            setTimeout(simulateClick, 0); // Second click immediately after the first
        }, 3000);
    }
};

