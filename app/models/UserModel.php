<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: Usermodel
 * 
 * Automatically generated via CLI.
 */
class Usermodel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function __construct()
    {
        parent::__construct();
    }

    public function find_by_username($username)
    {
        $this->call->database();

        return $this->db
            ->table($this->table)
            ->where('username', $username)
            ->get();
    }
}