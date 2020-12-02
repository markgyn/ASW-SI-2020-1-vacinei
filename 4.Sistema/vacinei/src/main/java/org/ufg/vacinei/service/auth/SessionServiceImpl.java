package org.ufg.vacinei.service.auth;

import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;
import org.ufg.vacinei.dao.repository.UserRepository;
import org.ufg.vacinei.model.User;
import java.security.Principal;
import java.util.Optional;

@Service
public class SessionServiceImpl implements SessionService {
	
	private final UserRepository userRepository;
	
	public SessionServiceImpl(UserRepository userRepository) {
		this.userRepository = userRepository;
	}
	
	@Override
	public User getAuthenticatedUser() {
		Principal principal =  SecurityContextHolder.getContext().getAuthentication();
		
		Optional<User> userOptional = userRepository.findByUserName(principal.getName());
		return userOptional.orElseThrow();
	}
	
	@Override
	public User authenticate() {
		return null;
	}
	
}
