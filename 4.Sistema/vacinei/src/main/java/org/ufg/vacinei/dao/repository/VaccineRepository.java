package org.ufg.vacinei.dao.repository;

import org.springframework.data.repository.CrudRepository;
import org.ufg.vacinei.model.Vaccine;
import java.time.LocalDate;
import java.util.Date;
import java.util.List;

public interface VaccineRepository extends CrudRepository<Vaccine, Long> {
	
	List<Vaccine> findAll();
	
	List<Vaccine> findByAvailabilityDateAfter(Date availabilityDate);
}
