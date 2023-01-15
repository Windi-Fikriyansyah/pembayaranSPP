<?php
function cek_login()
{
    $ci = &get_instance();
    $admin_session = $ci->session->userdata('id_petugas');
    if ($admin_session) {
        redirect('home');
    }
}

function cek_masuk()
{
    $ci = &get_instance();
    $admin_session = $ci->session->userdata('id_siswa');
    if ($admin_session) {
        redirect('home');
    }
}

function cek_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_petugas');
    if (!$user_session) {
        redirect('auth/login2');
    }
}
function cek_not_login1()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_siswa');
    if (!$user_session) {
        redirect('auth/login2');
    }
}

function cek_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->hak_akses != 'Admin') {
        redirect('home/not_found');
    }
}

function cek_admin1()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->hak_akses != 'Admin') {
        redirect('home');
    }
}
function cek_siswa()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->hak_akses != 'Siswa') {
        redirect('home');
    }
}

function cek_kepala_sekolah()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->hak_akses != 'Kepala sekolah') {
        redirect('home');
    }
}