
function copyToClipboard(element) {
	console.log($(element).parent().html());
    var $temp = $("<input>")
    $("body").append($temp);
    $temp.val($(element).parent().html());
    document.execCommand("copy");
    $temp.remove();
}

$('.example-template .cup').click(function(){
	copyToClipboard($(this).find(".coffee"));
})