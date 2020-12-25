<?php

/**
 * User permissions with Bitmask
 */
class UserPerms
{
    public function __construct()
    {
        // Set our permissions and their value.
        $this->permissions = [
            'read'    => 1,
            'write'   => 2,
            'delete'  => 4, // Values are doubled with each entry, this way there is only 1 possible way to have a 4 or 6
            'suspend' => 8,
            'ban'     => 16,
        ];
    }

    /**
     * Check if the user can perform an action
     *
     * @param string $action     The action to perform, ie read
     * @param integer $userPerms The user permission integer from the DB (1, 3, 6, etc)
     * @return boolean
     */
    public function hasPerm($action, $userPerms)
    {
        foreach ($this->permissions as $perm => $mask) {
            if ($action == $perm) {
                $ans = $userPerms & $mask;
                $can = boolval($ans);
                return $can ? 'TRUE' : 'FALSE'; // Just for Command Line Output, normally you would just return the above line
            }
        }
    }
}

$user = 11;

echo "Check if user can suspend, should be true.\n";
echo (new UserPerms)->hasPerm('suspend', $user);
echo "\nCheck if user can delete, should be false\n";
echo (new UserPerms)->hasPerm('delete', $user);
echo "\n";
