package org.ufg.vacinei.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.SequenceGenerator;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import java.util.Date;
import java.util.Set;

@Entity
@Table(name = "users")
public class User {
	
	@Id
	@GeneratedValue(
			strategy = GenerationType.AUTO,
			generator = "user_id_seq"
	)
	@SequenceGenerator(
			sequenceName = "user_id_seq",
			name = "user_id_seq",
			allocationSize = 1
	)
	private Long id;
	
	@Column(name = "enabled")
	private Boolean enabled = true;
	
	@Column(name = "username", nullable = false)
	private String userName;
	
	@Column(name = "password", nullable = false)
	private String password;
	
	@Column(name = "cpf", nullable = false, length = 11)
	private String cpf;
	
	@Temporal(TemporalType.TIMESTAMP)
	@Column(name = "birth_date", nullable = false)
	private Date birthday;
	
	@OneToMany(mappedBy = "user", fetch = FetchType.LAZY)
	private Set<Schedule> schedules;
	
	public Long getId() {
		return id;
	}
	
	public void setId(Long id) {
		this.id = id;
	}
	
	public Boolean getEnabled() {
		return enabled;
	}
	
	public void setEnabled(Boolean enabled) {
		this.enabled = enabled;
	}
	
	public String getUserName() {
		return userName;
	}
	
	public void setUserName(String user_name) {
		this.userName = user_name;
	}
	
	public String getPassword() {
		return password;
	}
	
	public void setPassword(String password) {
		this.password = password;
	}
	
	public String getCpf() {
		return cpf;
	}
	
	public void setCpf(String cpf) {
		this.cpf = cpf;
	}
	
	public Date getBirthday() {
		return birthday;
	}
	
	public void setBirthday(Date birthday) {
		this.birthday = birthday;
	}
	
	public Set<Schedule> getSchedules() {
		return schedules;
	}
	
	public void setSchedules(Set<Schedule> schedules) {
		this.schedules = schedules;
	}
	
}
