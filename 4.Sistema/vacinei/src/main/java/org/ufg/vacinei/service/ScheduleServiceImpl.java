package org.ufg.vacinei.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.ufg.vacinei.dao.repository.ScheduleRepository;
import org.ufg.vacinei.model.Schedule;
import org.ufg.vacinei.model.Vaccine;
import org.ufg.vacinei.service.auth.SessionService;
import org.ufg.vacinei.view.ScheduleDto;
import java.util.List;

@Service
public class ScheduleServiceImpl implements ScheduleService {
	
	private final VaccineService vaccineService;
	private final SessionService sessionService;
	private final ScheduleRepository scheduleRepository;
	
	@Autowired
	public ScheduleServiceImpl(VaccineService vaccineService, SessionService sessionService,
							   ScheduleRepository scheduleRepository) {
		this.vaccineService = vaccineService;
		this.sessionService = sessionService;
		this.scheduleRepository = scheduleRepository;
	}
	
	@Override
	public List<Schedule> getSchedulesForUser() {
		return scheduleRepository.findByUserId(sessionService.getAuthenticatedUser().getId());
	}
	
	@Override
	public Schedule scheduleVaccine(Schedule schedule) {
		schedule.setUser(sessionService.getAuthenticatedUser());
		return scheduleRepository.save(schedule);
	}
	
	@Override
	public Schedule updateSchedule(Schedule schedule) {
		return scheduleRepository.save(schedule);
	}
	
	@Override
	public Schedule scheduleDtoToEntity(ScheduleDto scheduleDto) {
		Vaccine scheduleVaccine = vaccineService.getVaccine(scheduleDto.getVaccineId());
		Schedule schedule = scheduleDto.toSchedule();
		schedule.setVaccine(scheduleVaccine);
		return schedule;
	}
	
}
