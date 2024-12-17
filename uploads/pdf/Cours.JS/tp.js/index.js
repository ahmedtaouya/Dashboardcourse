let name = prompt("Enter your name:");
alert("Bienvenue " + name);

function sayHello() {
    alert("Hello World!");
  }
  function showInput() {
    let input = document.getElementById("inputField").value;
    alert("You entered: " + input);
  }
  function jourDeLaSemaine() {
    const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    let today = new Date().getDay();
    alert("Today is " + days[today]);
  }
  function boucle() {
    let arr = [];
    for (let i = 0; i < 10; i++) {
      arr.push(i * i);
    }
    alert("Array: " + arr);
  }
  
  function boucle2() {
    let length = prompt("Enter the desired length:");
    let arr = [];
    for (let i = 0; i < length; i++) {
      arr.push(i * i);
    }
    alert("Array: " + arr);
  }
  function rectangleProperties() {
    let width = prompt("Enter width:");
    let length = prompt("Enter length:");
    let area = width * length;
    let perimeter = 2 * (Number(width) + Number(length));
    alert("Area: " + area + "\nPerimeter: " + perimeter);
  }
  function circleSurface() {
    let radius = prompt("Enter radius:");
    let surface = Math.PI * radius * radius;
    alert("Surface: " + surface);
  }
  let a = 3;
  let b = -2;
  
  function multiplie(x = 8) {
    return x * 3;
  }
  
  function affiche() {
    alert(multiplie(a));
    alert(multiplie(b));
    alert(multiplie());
  }
  function guessingGame() {
    let target = Math.floor(Math.random() * 101);
    let attempts = 0;
    let guess;
  
    do {
      guess = prompt("Guess a number between 0 and 100:");
      attempts++;
      if (guess > target) {
        alert("Try lower!");
      } else if (guess < target) {
        alert("Try higher!");
      }
    } while (guess != target);
  
    alert("Congratulations! You guessed it in " + attempts + " attempts.");
  }
          