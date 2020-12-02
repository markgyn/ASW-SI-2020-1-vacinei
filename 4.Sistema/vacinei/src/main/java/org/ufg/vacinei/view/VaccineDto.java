package org.ufg.vacinei.view;

import org.springframework.format.annotation.DateTimeFormat;
import org.ufg.vacinei.model.Vaccine;
import java.util.Date;

public class VaccineDto {
	
	private String name;
	@DateTimeFormat(iso = DateTimeFormat.ISO.DATE)
	private Date availabilityDate;
	
	public VaccineDto() {
	
	}
	
	public VaccineDto(Vaccine vaccine) {
		this.name = vaccine.getVaccineName();
		this.availabilityDate = vaccine.getAvailabilityDate();
	}
	
	public String getName() {
		return name;
	}
	
	public void setName(String name) {
		this.name = name;
	}
	
	public Date getAvailabilityDate() {
		return availabilityDate;
	}
	
	public void setAvailabilityDate(Date availabilityDate) {
		this.availabilityDate = availabilityDate;
	}
	
	public Vaccine toVaccine() {
		Vaccine vaccine = new Vaccine();
		vaccine.setVaccineName(getName());
		vaccine.setAvailabilityDate(getAvailabilityDate());
		
		return vaccine;
	}
	
}
