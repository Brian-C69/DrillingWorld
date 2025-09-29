$(document).ready(function () {
    // Event delegation for dynamically added links in search results
    $("#searchResults").on("click", ".list-group-item-action", function (event) {
        event.preventDefault();
        var href = $(this).attr("href");
        window.location.href = href;
    });

    // JavaScript to handle category change and display relevant calculators
    var categoryContainers = document.querySelectorAll('.category-container');

    function clearCalculatorList() {
        var calculatorContainers = document.querySelectorAll('.calculator-container');
        calculatorContainers.forEach(function (container) {
            container.remove(); // Remove previous calculator containers
        });
    }

    function addCalculators(calculatorLinks, categoryContainer) {
        // Create a new container for the calculators
        var calculatorContainer = document.createElement('div');
        calculatorContainer.classList.add('container', 'mt-3', 'calculator-container', 'list-group', 'list-group-item-action');

        // Append the calculator links to the new container
        calculatorLinks.forEach(function (link) {
            calculatorContainer.innerHTML += link;
        });

        // Insert the calculator container between the clicked category and the next category
        categoryContainer.parentNode.insertBefore(calculatorContainer, categoryContainer.nextSibling);
    }

    categoryContainers.forEach(function (category) {
        category.addEventListener('click', function () {
            console.log('Category clicked:', this.id);
            event.preventDefault(); // Prevent default action
            var categoryId = this.id;
            clearCalculatorList(); // Clear previous list

            // Add calculators based on the clicked category
            switch (categoryId) {
                case 'drillString':
                    var calculatorLinks = [
                        "<a href='calculators/TensileCapacityofDrillpipe.php' class='list-group-item list-group-item-action'>Tensile Capacity of Drill String</a>"
                    ];
                    addCalculators(calculatorLinks, category);
                    break;

                case 'cementing':
                    var calculatorLinks = [
                        "<a href='calculators/SqueezeBelowRetainerandBalanceCementPlugAboveRetainer.php' class='list-group-item list-group-item-action'>Squeeze Below Retainer and Balance Cement Plug Above Retainer</a>",
                        "<a href='calculators/BalanceCementPlugAboveRetainer.php' class='list-group-item list-group-item-action'>Balance Cement Plug Above Retainer</a>"
                    ];
                    addCalculators(calculatorLinks, category);
                    break;

                default:
                    console.error('Invalid category ID');
            }
        });
    });
});
