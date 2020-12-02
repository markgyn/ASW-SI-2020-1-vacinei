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
@Table(name = "vaccine")
public class Vaccine {
	
	@Id
	@GeneratedValue(
			strategy = GenerationType.AUTO,
			generator = "vaccine_id_seq"
	)
	@SequenceGenerator(
			sequenceName = "vaccine_id_seq",
			name = "vaccine_id_seq",
			allocationSize = 1
	)
	private Long id;
	
	@Temporal(TemporalType.TIMESTAMP)
	@Column(name = "availability_date", nullable = false)
	private Date availabilityDate;
	
	@Column(name = "vaccine_name", nullable = false)
	private String vaccineName;
	
	@OneToMany(mappedBy = "vaccine", fetch = FetchType.LAZY)
	private Set<Schedule> schedules;
	
	public Long getId() {
		return id;
	}
	
	public void setId(Long id) {
		this.id = id;
	}
	
	public Date getAvailabilityDate() {
		return availabilityDate;
	}
	
	public void setAvailabilityDate(Date availabilityDate) {
		this.availabilityDate = availabilityDate;
	}
	
	public String getVaccineName() {
		return vaccineName;
	}
	
	public void setVaccineName(String vaccineName) {
		this.vaccineName = vaccineName;
	}
	
}
