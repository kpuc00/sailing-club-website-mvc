<?php

    class contactView extends ContactFormController
    {
        public function __construct()
        {
            
        }

        public function populateTableWithMessages()
        {
            $result = $this->getAllMessages();

            echo "<div class='tableContainer'>";
            echo "<table>";
            echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>E-mail</th>";
                echo "<th>Phone</th>";
                echo "<th>Message</th>";
                echo "<th>Time</th>";
                echo "<th colspan='2'>Manage</th>";
            echo "</tr>";

            foreach($result as $row)
            {
                echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['Phone'] . "</td>";
                    echo "<td>" . $row['Message'] . "</td>";
                    echo "<td>" . $row['Timestamp'] . "</td>";

                    echo "<td>";
                        echo "<a href='mailto:" . $row['Email'] . "'>Respond</a>";
                    echo "</td>";

                    echo "<td>";
                        echo "<form action='app/resources/php/deleteMessage.php?contactId=" . $row["contactID"] . "' method='POST'>";
                            echo "<input type='submit' name='deleteMessage' value='Delete'/>";
                        echo "</form>";
                    echo "</td>";

                echo "</tr>";
            }

            echo "</table></div>";
        }
    }

?>