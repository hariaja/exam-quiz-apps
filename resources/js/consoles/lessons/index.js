import { showConfirmationModal } from "@/utils/helper.js";

let table;

$(() => {
    table = $(".table").DataTable();

    $("#status").on("change", function (e) {
        table.draw();
        e.preventDefault();
    });
});

function deleteLesson(url) {
    showConfirmationModal(
        "Dengan menekan tombol hapus, Maka semua data <b>Materi Pembelajaran</b> tersebut akan hilang!",
        "Hapus Data",
        url,
        "DELETE",
        handleSuccess
    );
}

function handleSuccess() {
    table.ajax.reload();
}

$(document).on("click", ".delete-lessons", function (e) {
    e.preventDefault();
    let url = urlDestroy;
    url = url.replace(":uuid", $(this).data("uuid"));
    deleteLesson(url);
});
