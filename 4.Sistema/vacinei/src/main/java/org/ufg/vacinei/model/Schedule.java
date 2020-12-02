package org.ufg.vacinei.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.SequenceGenerator;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import java.util.Date;

@Entity
@Table(name = "schedule")
public class Schedule {
	
	@Id
	@GeneratedValue(
			strategy = GenerationType.AUTO,
			generator = "schedule_id_seq"
	)
	@SequenceGenerator(
			sequenceName = "schedule_id_seq",
			name = "schedule_id_seq",
			allocationSize = 1
	)
	private Long id;
	
	@Temporal(TemporalType.TIMESTAMP)
	@Column(name = "schedule_date", nullable = false)
	private Date scheduleDate;
	
	@Column(name = "location", nullable = false)
	private String location;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private User user;
	
	@ManyToOne(fetch = FetchType.LAZY)
	private Vaccine vaccine;
	
	public Long getId() {
		return id;
	}
	
	public void setId(Long id) {
		this.id = id;
	}
	
	public Date getScheduleDate() {
		return scheduleDate;
	}
	
	public String getLocation() {
		return location;
	}
	
	public void setLocation(String location) {
		this.location = location;
	}
	
	public User getUser() {
		return user;
	}
	
	public void setUser(User user) {
		this.user = user;
	}
	
	public Vaccine getVaccine() {
		return vaccine;
	}
	
	public void setVaccine(Vaccine vaccine) {
		this.vaccine = vaccine;
	}
	
	public void setScheduleDate(Date scheduleDate) {
		this.scheduleDate = scheduleDate;
	}
	
}
