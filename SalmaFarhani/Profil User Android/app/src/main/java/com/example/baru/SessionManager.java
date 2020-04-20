package com.example.baru;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

import java.util.HashMap;

public class SessionManager {
    SharedPreferences sharedPreferences;
    public SharedPreferences.Editor editor;
    public Context context;
    int PRIVATE_MODE=0;

    private static final String PREF_USERNAME= "LOGIN";
    private static final String LOGIN = "IS LOGIN";
    private static final String USERNAME = "USERNAME";
    private static final String PASSWORD = "PASSWORD";
    private static final String NAMA = "NAMA";
    private static final String EMAIL = "EMAIL";
    private static final String ALAMAT = "ALAMAT";
    private static final String NO_HP = "NO HP";
    private static final String ID = "ID";
    private Object SharedPreferences;

    public SessionManager(MainActivity mainActivity) {
    }

    public void SessionManager(Context context){
        this.context = context;
        SharedPreferences= context.getSharedPreferences(PREF_USERNAME, PRIVATE_MODE);
//        editor = SharedPreferences.edit();
    }
    public void createSession(String username, String email, String id){
        editor.putBoolean(LOGIN, true);
        editor.putString(USERNAME, username);
        editor.putString(EMAIL, email);
        editor.putString(ID, id);
        editor.apply();
    }
    public boolean isLogin(){
        return sharedPreferences.getBoolean(LOGIN, false);
    }
    
    public HashMap<String, String> getUserDetail(){
        HashMap<String, String> user= new HashMap<>();
        user.put(USERNAME, sharedPreferences.getString(USERNAME, null));
        user.put(EMAIL, sharedPreferences.getString(EMAIL, null));
        user.put(ID, sharedPreferences.getString(ID, null));
        return user;
    }
}


