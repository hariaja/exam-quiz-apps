import { showConfirmationModal } from "@/utils/helper.js";

let table;

$(() => {
    table = $(".table").DataTable();
});

function deleteLevel(url) {
    showConfirmationModal(
        "Dengan menekan tombol hapus, Maka semua data <b>Jenjang Level</b> tersebut akan hilang!",
        "Hapus Data",
        url,
        "DELETE",
        handleSuccess
    );
}

function handleSuccess() {
    table.ajax.reload();
}

$(document).on("click", ".delete-levels", function (e) {
    e.preventDefault();
    let url = urlDestroy;
    url = url.replace(":uuid", $(this).data("uuid"));
    deleteLevel(url);
});
