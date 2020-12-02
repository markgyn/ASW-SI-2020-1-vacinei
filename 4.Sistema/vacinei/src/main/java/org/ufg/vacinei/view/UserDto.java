package org.ufg.vacinei.view;

import org.springframework.format.annotation.DateTimeFormat;
import org.ufg.vacinei.model.User;
import java.util.Date;

public class UserDto {
	private String name;
	@DateTimeFormat(iso = DateTimeFormat.ISO.DATE)
	private Date birthDate;
	private String cpf;
	private String password;
	private String passwordConfirmation;
	
	public UserDto() {
	}
	
	public UserDto(String name, Date birthDate, String cpf) {
		this.name = name;
		this.birthDate = birthDate;
		this.cpf = cpf;
	}
	
	public UserDto(User user) {
		this.name = user.getUserName();
		this.birthDate = user.getBirthday();
		this.cpf = user.getCpf();
	}
	
	public String getName() {
		return name;
	}
	
	public void setName(String name) {
		this.name = name;
	}
	
	public Date getBirthDate() {
		return birthDate;
	}
	
	public void setBirthDate(Date birthDate) {
		this.birthDate = birthDate;
	}
	
	public String getCpf() {
		return cpf;
	}
	
	public void setCpf(String cpf) {
		this.cpf = cpf;
	}
	
	public String getPassword() {
		return password;
	}
	
	public void setPassword(String password) {
		this.password = password;
	}
	
	public String getPasswordConfirmation() {
		return passwordConfirmation;
	}
	
	public void setPasswordConfirmation(String passwordConfirmation) {
		this.passwordConfirmation = passwordConfirmation;
	}
	
	public User toUser() {
		User user = new User();
		user.setUserName(this.name);
		user.setBirthday(this.birthDate);
		user.setCpf(this.cpf);
		
		return user;
	}
}
