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

            