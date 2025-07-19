// Opens the update modal and fills the form with the selected registration data
function openModal(id, name, age, level, phone, email, gender, hobby, message) {
    document.getElementById('update_id').value = id;
    document.getElementById('update_full_name').value = name;
    document.getElementById('update_age').value = age;
    document.getElementById('update_academic_level').value = level;
    document.getElementById('update_phone_number').value = phone;
    document.getElementById('update_email').value = email;
    document.getElementById('update_gender').value = gender;
    document.getElementById('update_favorite_hobby').value = hobby;
    document.getElementById('update_message').value = message;

    // Show the modal
    document.getElementById('updateModal').style.display = 'flex';
}

// Closes the update modal
function closeModal() {
    document.getElementById('updateModal').style.display = 'none';
}

// Function to download the table data as a CSV file
function downloadCSV() {
    const table = document.querySelector("table"); // Select the HTML table
    let csv = [];
    
    for (let row of table.rows) {
        let rowData = [];
        for (let cell of row.cells) {
            // Process the text, wrap it in quotes if it contains commas, quotes, or new lines
            let text = cell.innerText.replace(/"/g, '""');
            if (text.includes(",") || text.includes('"') || text.includes('\n')) {
                text = `"${text}"`;
            }
            rowData.push(text);
        }
        csv.push(rowData.join(","));
    }
    
    // Join all rows with new lines
    const csvString = csv.join("\n");

    // Create a blob and URL for download
    const blob = new Blob([csvString], { type: "text/csv;charset=utf-8;" });
    const url = URL.createObjectURL(blob);

    // Create a temporary link element
    const a = document.createElement("a");
    a.href = url;
    a.download = "registrations.csv";  // File name
    document.body.appendChild(a);
    a.click();

    // Clean up
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}
