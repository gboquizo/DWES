{

    let init = function () {

        // Use 'prop' instead of 'attr'
        // 'attr' only work the first time, better use 'prop'

    // add multiple select/unselect functionality

        $("#selectall").on("click", function () {
            $(".case").prop("checked", this.checked);
        });

    // if all checkbox are selected, check the selectall checkbox and viceversa

        $(".case").on("click", function () {
            if ($(".case").length == $(".case:checked").length) {
                $("#selectall").prop("checked", true);
            } else {
                $("#selectall").prop("checked", false);
            }
        });

        $("#selectall2").on("click", function () {
            $(".case2").prop("checked", this.checked);
        });

        // if all checkbox are selected, check the selectall checkbox and viceversa

        $(".case2").on("click", function () {
            if ($(".case2").length == $(".case2:checked").length) {
                $("#selectall2").prop("checked", true);
            } else {
                $("#selectall2").prop("checked", false);
            }
        });
    }

    $(init);
}