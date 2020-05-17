/**
 *
 * app.js
 *
 */

function readFile(input) {
    console.log(input.files)
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var htmlPreview =
                    '<img width="100" class="img-box" src="' +
                    e.target.result +
                    '" />' +
                    "<p>";
//                    +
//                    input.files[0].name +
//                    "</p>";
            var descZone = $(input).parent()
                    .find(".dropzone-desc");
            var wrapperZone = $(input).parent();
            var previewZone = $(input)
                    .parent()
                    .parent()
                    .find(".preview-zone");
            var boxZone = $(input)
                    .parent()
                    .parent()
                    .find(".preview-zone")
                    .find(".box")
                    .find(".box-body");

            wrapperZone.removeClass("dragover");
            previewZone.removeClass("hidden");
            descZone.addClass("hidden2");
            boxZone.empty();
            boxZone.append(htmlPreview);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function reset(e) {
    e.wrap("<form>")
            .closest("form")
            .get(0)
            .reset();
    e.unwrap();
}

$(".dropzone").change(function () {
    readFile(this);
});

$(".dropzone-wrapper").on("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass("dragover");
});

//$(".dropzone-wrapper").on("dragleave", function(e) {
//  e.preventDefault();
//  e.stopPropagation();
//  $(this).removeClass("dragover");
//});
$(".dropzone-wrapper").on("dragleave", function (e) {

    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass("dragover");
});

$(".remove-preview").on("click", function () {
    var descZone = $(this)
            .parents(".form-group")
            .find(".dropzone-desc");
    console.log(descZone);
    var boxZone = $(this)
            .parents(".preview-zone")
            .find(".box-body");
    var previewZone = $(this).parents(".preview-zone");
    var dropzone = $(this)
            .parents(".form-group")
            .find(".dropzone");
    descZone.removeClass("hidden2");
    boxZone.empty();
    previewZone.addClass("hidden");
    reset(dropzone);
});
