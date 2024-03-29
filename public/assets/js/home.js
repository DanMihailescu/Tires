var cars = ["Alfa Romeo","Aston Martin","Audi","Bentley","Benz","BMW","Bugatti","Cadillac",
"Chevrolet","Chrysler","Citroen","Corvette","DAF","Dacia","Daewoo","Daihatsu","Datsun",
"De Lorean","Dino","Dodge","Farboud","Ferrari","Fiat","Ford","Honda","Hummer","Hyundai",
"Jaguar","Jeep","KIA","Koenigsegg","Lada","Lamborghini","Lancia","Land Rover","Lexus","Ligier",
"Lincoln","Lotus","Martini","Maserati","Maybach","Mazda","McLaren","Mercedes","Mercedes-Benz",
"Mini","Mitsubishi","Nissan","Noble","Opel","Peugeot","Pontiac","Porsche","Renault","Rolls Royce",
"Rover","Saab","Seat","Skoda","Smart","Spyker","Subaru","Suzuki","Toyota","Vauxhall","Volkswagen","Volvo"];

var widths = ["6.40","7","7.5","8","8.75","9.5","24X","25X","26X","27X","29X","30X","31X","32X","33X",
"34X","35X","36X","37X","38X","39","40X","42X","105","115","125","135","145","155","165","175","185",
"195","205","215","225","235","245","255","265","275","285","295","305","315","325","335","345","355","375","395"];    
    
var depths = [0,7.5,8.5,9.5,10.5,11.5,12.5,13,14,14.5,15.5,16.5,18.5,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90];

var radius = [10,12,13,14,15,16,16.5,17,17.5,18,19,19.5,20,21,22,22.5,23,24,25,26,28,30];

var chosenBrand;
var chosenYear;
var chosenModel;

/*
    POPULATES THE SELECTION MENU

    Input:  args: The list of object that will be in the drop down
            type: Which drop down is being populated
*/
function populate(args, type){
    var sel = document.getElementById(type);

    // create text node to add to option element (opt)
    for (var i = 0; i < args.length; i++) {
        // create new option element
        var opt = document.createElement('option');
        opt.appendChild( document.createTextNode(args[i]) );
        // set value property of opt
        opt.value =  args[i]; 
        // add opt to end of select box (sel)
        sel.appendChild(opt);
    }
}

/*
    POPULATES THE BRAND SELECTION MENU
*/
function populateBrands() {
    populate(cars,'selBrand');
}

/*
    POPULATES THE MODEL SELECTION MENU

    Input:  brand: The currently choosen brand in the drop down
*/
function populateModels(brand) {

    populate(cars,'selModel');
}

/*
    REMOVES ALL MODELS IN THE MODEL SELECTION MENU
*/
function removeAllModels(type) {
    var sel = document.getElementById(type);
    }

/*
    POPULATES THE MODEL SELECTION MENU

    Input:  brand: The currently choosen brand in the drop down
            model: The currently choosen model in the drop down
*/
function populateYears(brand, model) { 

}

/*
    REMOVES ALL YEARS IN THE YEAR SELECTION MENU
*/
function removeAllYears() { 
    document.myform.master.options.length=0
}

/*
    POPULATES THE WIDTH SELECTION MENU
*/
function populateWidth() { 
    populate(widths,"selWidth");
}

/*
    POPULATES THE DEPTH SELECTION MENU
*/
function populateDepth() { 
    populate(depths,"selDepth");
}

/*
    POPULATES THE RADIUS SELECTION MENU
*/
function populateRadius() { 
    populate(radius,"selRadius");
}

function removeAll($element){
    var select = document.getElementById($element);
    var length = select.options.length;
    for (i = 0; i < length; i++) {
        select.options[i] = null;
    }
}