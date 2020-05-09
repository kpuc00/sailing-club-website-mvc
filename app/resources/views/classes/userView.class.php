<?php 

    class userView extends UsersController
    {
        public function __construct()
        {
            
        }

        public function usersList()
        {
            $result = $this->getAllUsers();

            echo "<div class='tableContainer'>";
            echo "<table>";
            echo "<tr>";
                echo "<th colspan='2'>Username</th>";
                echo "<th>Display name</th>";
                echo "<th>E-mail</th>";
                echo "<th>Phone</th>";
                echo "<th>Register date</th>";
                echo "<th>Last login</th>";
                echo "<th>Type</th>";
                echo "<th colspan='2'>Manage</th>";
            echo "</tr>";

            foreach($result as $row)
            {
                echo "<tr>";
                    echo "<td><img class='smallprofilepic' src='app/storage/images/profilepictures/" . $row['profilepicture'] . "'></td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['displayname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['registerdate'] . "</td>";
                    echo "<td>" . $row['lastlogin'] . "</td>";
                    echo "<td>" . $row['usertype'] . "</td>";

                    if($row['usertype']=="Super Admin")
                    {
                        echo "<td colspan='2'>Unavailable</td>";
                    }

                    else
                    {
                        echo "<td>";
                        if($row['usertype']=="User")
                        {
                            echo "<form action='app/resources/php/makeAdmin.php?userId=" . $row["id"] . "' method='POST'>";
                                echo "<input type='submit' name='makeadmin' value='Make admin'/>";
                            echo "</form>";
                        }

                        else if($row['usertype']=="Admin")
                        {
                            echo "<form action='app/resources/php/makeUser.php?userId=" . $row["id"] . "' method='POST'>";
                                echo "<input type='submit' name='makeuser' value='Make user'/>";
                            echo "</form>";
                        }
                        
                        echo "</td>";

                        echo "<td><form action='app/resources/php/deleteUser.php?userId=" . $row["id"] . "' method='POST'>";
                            echo "<input type='submit' name='delete' value='Delete'/>";
                        echo "</form></td>";
                    }

                echo "</tr>";
            }

            echo "</table></div>";
        }

        public function updateUserData($givenId)
        {
            $result = $this->getUserData($givenId);

            foreach($result as $usr)
            {
                $_SESSION['profilepicture'] = $usr['profilepicture'];
                $_SESSION['username'] = $usr['username'];
                $_SESSION['email'] = $usr['email'];
                $_SESSION['phone'] = $usr['phone'];
                $_SESSION['displayname'] = $usr['displayname'];
                $_SESSION['profilepicture'] = $usr['profilepicture'];
                $_SESSION['usertype'] = $usr['usertype'];
                $_SESSION['registerdate'] = $usr['registerdate'];
                $_SESSION['lastlogin'] = $usr['lastlogin'];
            }

        }

        public function MichaelPic()
        {
            $result = $this->getMichaelProfilePic();

            foreach ($result as $pic) 
            {
                echo $pic['profilepicture'];
            }
        }

        public function KrisPic()
        {
            $result = $this->getKrisProfilePic();
            
            foreach ($result as $pic) 
            {
                echo $pic['profilepicture'];
            }
        }

    }

?>