$(document).ready(function () {
    console.log("jQuery loaded ✔");

    let fillHeight = 0;
    const fillStep = 2;
    const container = $('#container');

    // Add #fill dynamically
    const fill = $('<div id="fill"></div>');
    container.append(fill);

    function fillContainer() {
        if (fillHeight < container.height()) {
            fillHeight += fillStep;
            fill.height(fillHeight);
            setTimeout(fillContainer, 70);
        } else {
            console.log("Filling complete 🚰");

            $('#loader').fadeOut('slow', function () {
                $('#welcome-message').fadeIn('slow', function () {
                 
                        window.location.href = 'home.php';
                
                });
            });
        }
    }

    fillContainer();
});

