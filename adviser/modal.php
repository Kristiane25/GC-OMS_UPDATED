<!DOCTYPE html>
<html>
<head>
    <title>Total OJT Hours</title>
    <style>
        /* CSS styling for modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>
        // JavaScript to show and hide the modal
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById("myModal");
            var button = document.getElementById("btnNavbarSearch");

            button.addEventListener('click', function() {
                // Get the value of u_id input
                var u_id = document.getElementById("u_id").value;

                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Define the request URL
                var url = "total_hours.php";

                // Define the request method and async setting
                xhr.open("POST", url, true);

                // Set the request headers
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                // Set the onload callback function
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Retrieve the response from total_hours.php
                        var response = xhr.responseText;

                        // Update the modal content
                        var modalContent = document.getElementById("modalContent");
                        modalContent.innerHTML = response;

                        // Show the modal
                        modal.style.display = "block";
                    }
                };

                // Send the request with the u_id value as a parameter
                xhr.send("u_id=" + u_id);
            });

            function closeModal() {
                modal.style.display = "none";
            }
        });
    </script>
</head>
<body>
    <h2>Total OJT Hours</h2>

    <form method="POST" action="total_hours.php" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group mt-3 mb-3">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" id="u_id" name="u_id" />
            <button class="btn btn-warning" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modalContent"></div>
        </div>
    </div>
</body>
</html>
