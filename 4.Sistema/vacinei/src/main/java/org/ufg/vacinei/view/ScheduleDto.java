package org.ufg.vacinei.view;

import org.springframework.format.annotation.DateTimeFormat;
import org.ufg.vacinei.model.Schedule;
import org.ufg.vacinei.model.Vaccine;
import java.util.Date;

public class ScheduleDto {
	
	private Long id;
	private Long vaccineId;
	private String vaccineName;
	@DateTimeFormat(iso = DateTimeFormat.ISO.DATE)
	private Date scheduleDate;
	private String location;
	
	public ScheduleDto() {
	}
	
	public ScheduleDto(Long id, Long vaccineId, Date scheduleDate, String location) {
		this.id = id;
		this.vaccineId = vaccineId;
		this.scheduleDate = scheduleDate;
		this.location = location;
	}
	
	public ScheduleDto(Schedule schedule) {
		this.id = schedule.getId();
		this.vaccineId = schedule.getVaccine().getId();
		this.vaccineName = schedule.getVaccine().getVaccineName();
		this.location = schedule.getLocation();
		this.scheduleDate = schedule.getScheduleDate();
	}
	
	public Long getId() {
		return id;
	}
	
	public void setId(Long id) {
		this.id = id;
	}
	
	public Long getVaccineId() {
		return vaccineId;
	}
	
	public void setVaccineId(Long vaccineId) {
		this.vaccineId = vaccineId;
	}
	
	public Date getScheduleDate() {
		return scheduleDate;
	}
	
	public void setScheduleDate(Date scheduleDate) {
		this.scheduleDate = scheduleDate;
	}
	
	public String getLocation() {
		return location;
	}
	
	public void setLocation(String location) {
		this.location = location;
	}
	
	public String getVaccineName() {
		return vaccineName;
	}
	
	public void setVaccineName(String vaccineName) {
		this.vaccineName = vaccineName;
	}
	
	public Schedule toSchedule() {
		Schedule schedule = new Schedule();
		schedule.setId(getId());
		
		Vaccine vaccine = new Vaccine();
		vaccine.setId(getVaccineId());
		schedule.setVaccine(vaccine);
		
		schedule.setScheduleDate(getScheduleDate());
		
		schedule.setLocation(getLocation());
		
		return schedule;
	}
	
}
